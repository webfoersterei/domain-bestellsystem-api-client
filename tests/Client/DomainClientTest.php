<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.03.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\InfoResponseItemExtension;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\ListResponse;
use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class DomainClientTest extends AbstractClientTest
{
    public function testDomainCheckNotAvailable()
    {
        $response = file_get_contents(__DIR__.'/../Resources/DomainClient/domainCheck_response_01.xml');
        $soapClient = $this->getSoapClient('domainCheck', $this->createStdClassFromApiResponse($response));
        $domainClient = $this->getDomainClient($soapClient);

        $response = $domainClient->check('example.org');

        $this->assertInstanceOf(CheckResponse::class, $response);
        $this->assertFalse($response->isAvailable());
        $this->assertEquals('connect', $response->getDetailedStatus());
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals(0, $response->getReturnSubCode());
        $this->assertNull($response->getReturnMessage());
    }

    public function testDomainCheckAvailable()
    {
        $response = file_get_contents(__DIR__.'/../Resources/DomainClient/domainCheck_response_02.xml');
        $soapClient = $this->getSoapClient('domainCheck', $this->createStdClassFromApiResponse($response));
        $domainClient = $this->getDomainClient($soapClient);

        $response = $domainClient->check('example.com');

        $this->assertInstanceOf(CheckResponse::class, $response);
        $this->assertTrue($response->isAvailable());
        $this->assertEquals('free', $response->getDetailedStatus());
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals(0, $response->getReturnSubCode());
        $this->assertNull($response->getReturnMessage());
    }

    public function testDomainListMultipleOneReseller()
    {
        $response = file_get_contents(__DIR__.'/../Resources/DomainClient/domainList_response_01.xml');
        $soapClient = $this->getSoapClient('domainList', $this->createStdClassFromApiResponse($response));
        $domainClient = $this->getDomainClient($soapClient);

        $response = $domainClient->list();

        $this->assertInstanceOf(ListResponse::class, $response);
        $this->assertCount(3, $response->getDomainsList());

        $entry = $response->getDomainsList()[0];
        $this->assertEquals('example.com', $entry->getDomainName());
        $this->assertEquals('com', $entry->getTld());
        $this->assertEquals('FAKE-12345', $entry->getReseller());

        $entry = $response->getDomainsList()[1];
        $this->assertEquals('example.org', $entry->getDomainName());
        $this->assertEquals('org', $entry->getTld());
        $this->assertEquals('FAKE-12345', $entry->getReseller());

        $entry = $response->getDomainsList()[2];
        $this->assertEquals('webfoersterei.de', $entry->getDomainName());
        $this->assertEquals('de', $entry->getTld());
        $this->assertEquals('FAKE-12345', $entry->getReseller());
    }

    public function testDomainInfoKk()
    {
        $response = file_get_contents(__DIR__.'/../Resources/DomainClient/domainInfo_response_01.xml');
        $soapClient = $this->getSoapClient('domainInfo', $this->createStdClassFromApiResponse($response));
        $domainClient = $this->getDomainClient($soapClient);

        $response = $domainClient->info('example.org');

        $this->assertInstanceOf(InfoResponse::class, $response);
        $domain = $response->getDomainsList()[0];

        $this->assertEquals('example.org', $domain->getDomainName());
        $this->assertEquals('org', $domain->getTld());
        $this->assertEquals('TT7777777@HANDLES.DE', $domain->getAdminC());
        $this->assertEquals('TT7777777@HANDLES.DE', $domain->getOwnerC());
        $this->assertEquals('TT7777777@HANDLES.DE', $domain->getTechC());
        $this->assertEquals('TT7777777@HANDLES.DE', $domain->getZoneC());
        $this->assertEquals('ns01.example.com', $domain->getPrimaryNameserver());
        $this->assertCount(1, $domain->getSecondaryNameserver());
        $this->assertEquals('ns02.example.com', $domain->getSecondaryNameserver()['item']);

        $this->assertCount(2, $domain->getNameservers());
        $this->assertEquals('ns01.example.com', $domain->getNameservers()[0]->getNs());
        $this->assertEquals('192.168.2.1', $domain->getNameservers()[0]->getIpv4());
        $this->assertEquals('ns02.example.com', $domain->getNameservers()[1]->getNs());
        $this->assertEquals('192.168.2.2', $domain->getNameservers()[1]->getIpv4());

        $this->assertEquals('FAKE-12345', $domain->getReseller());
        $this->assertEquals(1042352959, $domain->getOrderDate()->getTimestamp());
        $this->assertNull($domain->getExecutionDate());
        $this->assertEquals(1042352976, $domain->getSystemInDate()->getTimestamp());
        $this->assertNull($domain->getPaidUntilDate());
        $this->assertNull($domain->getToBeDeletedDate());

        $this->assertEquals('kk_ok_com', $domain->getStatus());
        $this->assertEquals('active', $domain->getDomainStatus());
        $this->assertNull($domain->getDomainSubStatus());
        # transferFrom / transferTo missing
        $this->assertEquals(123, $domain->getOrderNumber());
        $this->assertEquals('KK', $domain->getRegType());
        $this->assertNull($domain->getRemarks());
        $this->assertEquals('notify@example.com', $domain->getNotifyEmail());
        $this->assertNull($domain->getTags());
        $this->assertInstanceOf(InfoResponseItemExtension::class, $domain->getExtension());
    }

}