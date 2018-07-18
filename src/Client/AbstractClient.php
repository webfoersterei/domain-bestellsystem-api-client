<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;
use Webfoersterei\DomainBestellSystemApiClient\Enum\ResponseReturnCodeEnum;
use Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException;
use Webfoersterei\DomainBestellSystemApiClient\Exception\ResponseException;

abstract class AbstractClient
{
    use LoggerAwareTrait;

    /**
     * @var \SoapClient
     */
    protected $soapClient;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var ObjectNormalizer
     */
    private $objectNormalizer;

    public function __construct(\SoapClient $soapClient, Serializer $serializer, ObjectNormalizer $arrayNormalizer)
    {
        $this->soapClient = $soapClient;
        $this->serializer = $serializer;
        $this->objectNormalizer = $arrayNormalizer;
        $this->logger = new NullLogger();
    }

    /**
     * @param string $method
     * @param string $type
     * @param array|null $arguments
     * @param array $context
     * @return object
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\ResponseException
     * @throws InvalidArgumentException
     */
    protected function doApiCall(string $method, string $type, array $arguments = [], array $context = [])
    {
        if (!is_subclass_of($type, AbstractResponse::class)) {
            throw new InvalidArgumentException('Parameter type must be subclass of AbstractResponse');
        }

        $txId = uniqid('TXID.', true);

        $parameters = array_merge($arguments, ['clientTRID' => $txId]);
        $this->logger->info(sprintf('Sending soapRequest for method "%s"', $method),
            ['method' => $method, 'parameters' => $parameters]);
        $stdClassResponse = $this->soapClient->__soapCall($method, ['parameters' => $parameters]);

        if (null !== $this->soapClient->__getLastRequest()) {
            $this->logger->debug('Raw request', ['request_raw_body' => $this->soapClient->__getLastRequest()]);
        }

        if (null !== $this->soapClient->__getLastResponse()) {
            $this->logger->debug('Raw response of request',
                ['response_raw_body' => $this->soapClient->__getLastResponse()]);
        }
        $this->logger->debug('Stdobject response of request', ['response_stdobject_body' => $stdClassResponse]);

        $arrayResponse = $this->convertResponseToArray($stdClassResponse);
        $filteredResponse = $this->filterResponse($arrayResponse);
        $this->logger->debug('Filtered response of request', ['response_filtered_body' => $filteredResponse]);

        /** @var AbstractResponse $response */
        $response = $this->serializer->deserialize(json_encode($filteredResponse), $type, 'json', $context);
        $this->logger->debug('Deserialized response of request', ['response_deserialized' => $response]);

        $this->raiseExceptions($response);

        return $response;
    }

    /**
     * @param \stdClass $response
     * @return array|null
     */
    private function convertResponseToArray($response)
    {
        return json_decode(json_encode($response), true);
    }

    /**
     * @param array $responseArray
     * @return mixed
     */
    private function filterResponse($responseArray)
    {
        $filteredArray = [];

        if (!is_array($responseArray)) {
            return $responseArray;
        }

        foreach ($responseArray as $key => $value) {
            if (is_array($value) && isset($value['item'])) {
                $filteredArray[$key] = $this->filterResponse($value['item']);
            } else {
                $filteredArray[$key] = $this->filterResponse($value);
            }
        }

        return $filteredArray;
    }

    /**
     * @param AbstractResponse $response
     * @throws ResponseException
     */
    private function raiseExceptions(AbstractResponse $response)
    {
        $returnCode = $response->getReturnCode();
        if (ResponseReturnCodeEnum::hasKey($returnCode) && null !== ResponseReturnCodeEnum::getValue($returnCode)) {
            $exceptionClass = ResponseReturnCodeEnum::getValue($returnCode);
            throw new $exceptionClass($response);
        }
    }

    /**
     * @param $request
     * @return array
     * @throws \Symfony\Component\Serializer\Exception\LogicException
     * @throws \Symfony\Component\Serializer\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Serializer\Exception\CircularReferenceException
     */
    protected function convertRequestToArray($request): array
    {
        $requestArray = $this->objectNormalizer->normalize($request);

        return $this->createArrayWrapper($requestArray);
    }

    /**
     * @param $requestArray
     * @return mixed
     */
    private function createArrayWrapper($requestArray)
    {
        $filteredArray = [];

        if (!is_array($requestArray)) {
            return $requestArray;
        }

        foreach ($requestArray as $key => $value) {
            if ($this->isItemArray($value)) {
                $filteredArray[$key] = ['item' => $value];
            } else {
                $filteredArray[$key] = $this->createArrayWrapper($value);
            }
        }

        return $filteredArray;
    }

    /**
     * @param $value
     * @return bool
     */
    private function isItemArray($value): bool
    {
        if (!is_array($value)) {
            return false;
        }

        // If multiDimension-array: true
        foreach ($value as $v) {
            if (is_array($v)) {
                return true;
            }
        }

        // If array has more than one key and the keys are numeric (list of something...)
        // List of String is needed for DomainUpdate.nameserver
        return count($value) > 1 && count(array_filter(array_keys($value), 'is_string')) === 0;
    }
}