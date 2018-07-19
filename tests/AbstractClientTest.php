<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests;


use PHPUnit\Framework\TestCase;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\HandleClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;

abstract class AbstractClientTest extends TestCase
{

    /**
     * @param $method
     * @param mixed $response Most probably a stdClass (@see createStdClassFromApiResponse)
     * @return \PHPUnit\Framework\MockObject\MockObject|\SoapClient
     */
    protected function getSoapClient($method, $response)
    {
        $stub = $this->getMockFromWsdl(__DIR__.'/Resources/soap.wsdl');

        $stub->expects($this->once())->method('__soapCall')
            ->with(
                $this->equalTo($method),
                $this->isType('array') // parameters
            )
            ->willReturn($response);

        return $stub;
    }

    /**
     * Hack to return stdClass of api returnValue only (for XML-Mocks)
     * @param $apiXmlResponseString
     * @return mixed
     */
    protected function createStdClassFromApiResponse($apiXmlResponseString)
    {
        $xml = preg_replace('/(<\/?)([\w-]+):([^>]*>)/', '$1$2$3', $apiXmlResponseString);
        $returnValueInXml = (new \SimpleXMLElement($xml))->xpath('//return')[0];

        return json_decode(json_encode($returnValueInXml));
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

    /**
     * @param $soapClient
     * @return HandleClient
     */
    protected function getHandleClient($soapClient): HandleClient
    {
        SoapMockClientFactory::setSoapClient($soapClient);

        return SoapMockClientFactory::createHandleClient(null, null, null);
    }
}