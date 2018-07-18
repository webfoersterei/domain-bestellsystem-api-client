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
     * @param $response
     * @return \PHPUnit\Framework\MockObject\MockObject|\SoapClient
     */
    protected function getSoapClient($method, $response = null)
    {
        $stub = $this->getMockBuilder(\SoapClient::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $stub->method('__soapCall')
            ->with(
                $this->equalTo($method),
                $this->anything()
            )
            ->willReturn(json_decode(json_encode(new \SimpleXMLElement($response)))); # return stdclass of xml response

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