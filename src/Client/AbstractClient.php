<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Symfony\Component\Serializer\Serializer;

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

    public function __construct(\SoapClient $soapClient, Serializer $serializer)
    {
        $this->soapClient = $soapClient;
        $this->serializer = $serializer;
    }

    /**
     * @param string $method
     * @param string $type
     * @param array|null $arguments
     * @return object
     */
    protected function doApiCall(string $method, string $type, array $arguments = [])
    {
        $txId = uniqid('TXID.', true);

        $parameters = array_merge($arguments, ['clientTRID' => $txId]);
        $response = $this->soapClient->__soapCall($method, ['parameters' => $parameters]);

        $arrayResponse = $this->convertResponseToArray($response);
        $filteredResponse = $this->filterResponse($arrayResponse);

        return $this->serializer->deserialize(json_encode($filteredResponse), $type, 'json');
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

}