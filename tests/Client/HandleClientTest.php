<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\ListResponse;
use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class HandleClientTest extends AbstractClientTest
{

    public function testHandleList()
    {
        $response = file_get_contents(__DIR__.'/../Resources/HandleClient/handleList_response_01.xml');
        $soapClient = $this->getSoapClient('handleList', $this->createStdClassFromApiResponse($response));
        $handleClient = $this->getHandleClient($soapClient);

        $response = $handleClient->getList();

        $this->assertInstanceOf(ListResponse::class, $response);

        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertCount(2, $response->getHandleList());

        $handle1 = $response->getHandleList()[0];
        $this->assertEquals('Toni', $handle1->getFirstname());
        $this->assertEquals('Tester', $handle1->getLastname());
        $this->assertNull($handle1->getCompany());
        $this->assertEquals('TT7777777@HANDLES.DE', $handle1->getHandleId());

        $handle2 = $response->getHandleList()[1];
        $this->assertEquals('Tanja', $handle2->getFirstname());
        $this->assertEquals('Testerin', $handle2->getLastname());
        $this->assertEquals('Testfirma GmbH', $handle2->getCompany());
        $this->assertEquals('TT8888888@HANDLES.DE', $handle2->getHandleId());
    }

    public function testHandleGet()
    {
        $response = file_get_contents(__DIR__.'/../Resources/HandleClient/handleGet_response_01.xml');
        $soapClient = $this->getSoapClient('handleInfo', $this->createStdClassFromApiResponse($response));
        $handleClient = $this->getHandleClient($soapClient);

        $response = $handleClient->get('TT7777777@HANDLES.DE');

        $this->assertInstanceOf(InfoResponse::class, $response);

        $this->assertEquals('Tanja', $response->getFirstname());
        $this->assertEquals('Testerin', $response->getLastname());
        $this->assertEquals('Testfirma GmbH', $response->getCompany());
        $this->assertEquals('Testgasse 29b', $response->getStreet());
        $this->assertEquals('01255', $response->getPcode());

        $this->assertEquals('Berlin', $response->getCity());
        $this->assertEquals('DE', $response->getCountry());
        $this->assertEquals('+49 555 12345678', $response->getPhone());
        $this->assertNull($response->getFax());
        $this->assertEquals('tanja.tester@example.com', $response->getEmail());

        $this->assertEquals('TT7777777@HANDLES.DE', $response->getHandle());
        $this->assertEquals('FAKE-12345', $response->getReseller());
        $this->assertEquals(1000, $response->getReturnCode());
        $this->assertEquals('FAKE.5b50afc6e89892.96756787', $response->getClientTRID());
        $this->assertNull($response->getExtension());
    }

    public function testHandleCheckNotAvailable()
    {
        $response = file_get_contents(__DIR__.'/../Resources/HandleClient/handleCheck_response_01.xml');
        $soapClient = $this->getSoapClient('handleCheck', $this->createStdClassFromApiResponse($response));
        $handleClient = $this->getHandleClient($soapClient);

        $response = $handleClient->check('TT1775777@HANDLES.DE');

        $this->assertInstanceOf(CheckResponse::class, $response);
        $this->assertFalse($response->isAvailable());
    }

    public function testHandleCheckAvailable()
    {
        $response = file_get_contents(__DIR__.'/../Resources/HandleClient/handleCheck_response_02.xml');
        $soapClient = $this->getSoapClient('handleCheck', $this->createStdClassFromApiResponse($response));
        $handleClient = $this->getHandleClient($soapClient);

        $response = $handleClient->check('TT7777777@HANDLES.DE');

        $this->assertInstanceOf(CheckResponse::class, $response);
        $this->assertTrue($response->isAvailable());
    }

}