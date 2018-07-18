<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneInfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class NameServerClientTest extends AbstractClientTest
{

    public function testZoneInfo()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverZoneInfo_response_01.xml');
        $soapClient = $this->getSoapClient('nameserverZoneInfo', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $response = $nameServerClient->zoneInfo('example.org');
        $this->assertInstanceOf(ZoneInfoResponse::class, $response);

        $this->assertEquals('example.org', $response->getOrigin());
        $this->assertEquals(28800, $response->getRefresh());
        $this->assertEquals(7200, $response->getRetry());
        $this->assertEquals(604800, $response->getExpire());
        $this->assertEquals(86400, $response->getTtl());
        $this->assertEquals(300, $response->getMinimumTtl());
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertNull($response->getReturnSubCode());
        $this->assertNull($response->getReturnMessage());

        $this->assertCount(1, $response->getRrList());
        $rr = $response->getRrList()[0];
        $this->assertEquals(0, $rr->getAux());
        $this->assertEquals('192.168.1.3', $rr->getData());
        $this->assertEquals('myhost03', $rr->getName());
        $this->assertEquals(86400, $rr->getTtl());
        $this->assertEquals('A', $rr->getType());
    }

}