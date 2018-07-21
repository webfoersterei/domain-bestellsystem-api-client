<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecord;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordCreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordCreateResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordDeleteRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordDeleteResponse;
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

    public function testZoneInfoMultipleRr()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverZoneInfo_response_02.xml');
        $soapClient = $this->getSoapClient('nameserverZoneInfo', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $response = $nameServerClient->zoneInfo('example.org');
        $this->assertInstanceOf(ZoneInfoResponse::class, $response);

        $this->assertCount(5, $response->getRrList());

        $rr = $response->getRrList()[1];
        $this->assertEquals(1, $rr->getAux());
        $this->assertEquals('myhost03.example.org', $rr->getData());
        $this->assertNull($rr->getName());
        $this->assertEquals(900, $rr->getTtl());
        $this->assertEquals('MX', $rr->getType());

        $rr = $response->getRrList()[3];
        $this->assertEquals(0, $rr->getAux());
        $this->assertEquals('192.168.1.3', $rr->getData());
        $this->assertEquals('myhost03', $rr->getName());
        $this->assertEquals(86400, $rr->getTtl());
        $this->assertEquals('A', $rr->getType());

        $rr = $response->getRrList()[4];
        $this->assertEquals(0, $rr->getAux());
        $this->assertEquals('myhost03.example.org', $rr->getData());
        $this->assertEquals('mysql', $rr->getName());
        $this->assertEquals(300, $rr->getTtl());
        $this->assertEquals('CNAME', $rr->getType());
    }

    public function testRrCreate()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverRrCreate_response_01.xml');
        $soapClient = $this->getSoapClient('nameserverRRCreate', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $newRr = new ResourceRecord();
        $newRr->setName('test')->setType('A')->setData('127.0.0.1')->setTtl(300);
        $rrCreate = new ResourceRecordCreateRequest();
        $rrCreate->setRr([$newRr]);

        $response = $nameServerClient->rrCreate('example.org', $rrCreate);
        $this->assertInstanceOf(ResourceRecordCreateResponse::class, $response);
        $this->assertEquals(1000, $response->getReturnCode());
    }

    public function testRrDelete()
    {
        $response = file_get_contents(__DIR__.'/../Resources/NameServerClient/nameserverRrDelete_response_01.xml');
        $soapClient = $this->getSoapClient('nameserverRRDelete', $this->createStdClassFromApiResponse($response));
        $nameServerClient = $this->getNameServerClient($soapClient);

        $oldRr = new ResourceRecord();
        $oldRr->setName('test')->setType('A')->setData('127.0.0.1')->setTtl(300);
        $rrDelete = new ResourceRecordDeleteRequest();
        $rrDelete->setRr($oldRr);

        $response = $nameServerClient->rrDelete('example.org', $rrDelete);
        $this->assertInstanceOf(ResourceRecordDeleteResponse::class, $response);
        $this->assertEquals(1000, $response->getReturnCode());
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
        $zoneCreateRequest->setSoaMbox('root.example.org')
            ->setRr($resourceRecords);

        $response = $nameServerClient->zoneCreate('example.org', $zoneCreateRequest);

        $this->assertInstanceOf(ZoneCreateResponse::class, $response);
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals(0, $response->getReturnSubCode());
        $this->assertNull($response->getReturnMessage());
    }

}