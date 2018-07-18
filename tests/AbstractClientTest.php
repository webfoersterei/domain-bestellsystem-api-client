<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests;


use PHPUnit\Framework\TestCase;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;

abstract class AbstractClientTest extends TestCase
{

    /**
     * @param $method
     * @param $soapResponse
     * @return \PHPUnit\Framework\MockObject\MockObject|\SoapClient
     */
    protected function getSoapClient($method, $soapResponse = null)
    {
        $stub = $this->getMockFromWsdl('http://www.domain-bestellsystem.de/soapstatus/wsdl/soap.wsdl');

        $xml = preg_replace('/(<\/?)([\w-]+):([^>]*>)/', '$1$2$3', $soapResponse);
        $returnValueInXml = (new \SimpleXMLElement($xml))->xpath('//return')[0];
        $response = json_decode(json_encode($returnValueInXml));

        $stub->method('__soapCall')
            ->willReturn($response); # return stdclass of xml response

        return $stub;
    }

    /**
     * @param \SoapClient $soapClient
     * @return NameServerClient
     */
    protected function getNameServerClient($soapClient): NameServerClient
    {
        SoapMockClientFactory::setSoapClient($soapClient);

        return SoapMockClientFactory::createNameServerClient(null, null, null);
    }

    /**
     * @param \SoapClient $soapClient
     * @return DomainClient
     */
    protected function getDomainClient($soapClient): DomainClient
    {
        SoapMockClientFactory::setSoapClient($soapClient);

        return SoapMockClientFactory::createDomainClient(null, null, null);
    }
}