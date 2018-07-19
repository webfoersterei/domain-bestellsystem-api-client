<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecord;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneCreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneCreateResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneDeleteResponse;
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

    public function testZoneDelete()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverZoneDelete_response_01.xml');
        $soapClient = $this->getSoapClient('nameserverZoneDelete', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $response = $nameServerClient->zoneDelete('example.org');

        $this->assertInstanceOf(ZoneDeleteResponse::class, $response);
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals(0, $response->getReturnSubCode());
        $this->assertEquals('Zone successfully deleted', $response->getReturnMessage());
    }

    public function testZoneCreate()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverZoneCreate_response_01.xml');
        $soapClient = $this->getSoapClient('nameserverZoneCreate', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $zoneCreateRequest = new ZoneCreateRequest();
        $resourceRecord = new ResourceRecord();
        $resourceRecord->setName('example.org')
            ->setType('A')
            ->setData('123.123.123.123');
        $resourceRecords[] = $resourceRecord;
        $zoneCreateRequest->setSoaOrigin('example.org')
            ->setSoaMbox('root.example.org')
            ->setRr($resourceRecords);

        $response = $nameServerClient->zoneCreate($zoneCreateRequest);

        $this->assertInstanceOf(ZoneCreateResponse::class, $response);
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals(0, $response->getReturnSubCode());
        $this->assertNull($response->getReturnMessage());
    }

}