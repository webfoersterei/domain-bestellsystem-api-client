<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.03.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;

class DomainClientTest extends TestCase
{
    public function testBasicJson()
    {
        $soapClient = $this->getSoapClient('domainCheck', null);
        $domainClient = new DomainClient($soapClient, $this->getSerializer(), $this->getObjectNormalizer());

        $this->assertInstanceOf(CheckResponse::class, $domainClient->check('webfoersterei.de'));
    }

    /**
     * @param $method
     * @param $response
     * @return \PHPUnit\Framework\MockObject\MockObject|\SoapClient
     */
    private function getSoapClient($method, $response = null)
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
            ->willReturn($response);

        return $stub;
    }

    /**
     * @return Serializer
     */
    private function getSerializer()
    {
        return new Serializer([$this->getObjectNormalizer()], [new JsonEncoder()]);
    }

    /**
     * @return ObjectNormalizer
     */
    private function getObjectNormalizer()
    {
        return new ObjectNormalizer();
    }

}