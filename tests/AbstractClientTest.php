<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests;


use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
            ->willReturn($response);

        return $stub;
    }

    /**
     * @return Serializer
     */
    protected function getSerializer()
    {
        return new Serializer([$this->getObjectNormalizer()], [new JsonEncoder()]);
    }

    /**
     * @return ObjectNormalizer
     */
    protected function getObjectNormalizer()
    {
        return new ObjectNormalizer();
    }
}