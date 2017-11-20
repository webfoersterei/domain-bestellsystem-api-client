<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;
use Webfoersterei\DomainBestellSystemApiClient\Enum\ResponseReturnCodeEnum;
use Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException;
use Webfoersterei\DomainBestellSystemApiClient\Exception\ResponseException;

abstract class AbstractClient
{
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
    }

    /**
     * @param string $method
     * @param string $type
     * @param array|null $arguments
     * @return object
     * @throws InvalidArgumentException
     * @throws ResponseException
     */
    protected function doApiCall(string $method, string $type, array $arguments = [])
    {
        if (!is_subclass_of($type, AbstractResponse::class)) {
            throw new InvalidArgumentException('Parameter type must be subclass of AbstractResponse');
        }

        $txId = uniqid('TXID.', true);

        $parameters = array_merge($arguments, ['clientTRID' => $txId]);
        $rawResponse = $this->soapClient->__soapCall($method, ['parameters' => $parameters]);

        $arrayResponse = $this->convertResponseToArray($rawResponse);
        $filteredResponse = $this->filterResponse($arrayResponse);

        /** @var AbstractResponse $response */
        $response = $this->serializer->deserialize(json_encode($filteredResponse), $type, 'json');

        $this->raiseExceptions($response);

        return $response;
    }

    /**
     * @param \stdClass $response
     * @return array
     */
    private function convertResponseToArray($response): array
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
        return $this->objectNormalizer->normalize($request);
    }

}