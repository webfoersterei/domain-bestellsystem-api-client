<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;
use Webfoersterei\DomainBestellSystemApiClient\Enum\ResponseReturnCodeEnum;
use Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException;

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

    public function __construct(\SoapClient $soapClient, Serializer $serializer)
    {
        $this->soapClient = $soapClient;
        $this->serializer = $serializer;
        $this->logger = new NullLogger();
    }

    /**
     * @param string $method
     * @param string $type
     * @param array|null $arguments
     * @param array $context
     * @return object
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
    private function convertResponseToArray($response): ?array
    {
        return json_decode(json_encode($response), true);
    }

    /**
     * Converts string values that arent string to their correct value
     * @param array $value
     * @return mixed
     */
    private function filterResponse($value)
    {

        if (!\is_array($value)) {
            if ($value === 'false') {
                return false;
            }
            if ($value === 'true') {
                return true;
            }
            if ((string)(int)$value === $value) {
                return (int)$value;
            }

            return $value;
        }

        if ($value === []) {
            return null;
        }

        $arr = [];
        foreach ($value as $key => $val) {
            $arr[$key] = $this->filterResponse($val);
        }

        return $arr;
    }

    /**
     * @param AbstractResponse $response
     */
    private function raiseExceptions(AbstractResponse $response): void
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
        return $this->serializer->normalize($request);
    }
}