<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class HandleClientTest extends AbstractClientTest
{

    public function testList()
    {
        $response = file_get_contents(__DIR__.'/../Resources/HandleClient/handleList_response_01.xml');
        $soapClient = $this->getSoapClient('handleList', $this->createStdClassFromApiResponse($response));
        $handleClient = $this->getHandleClient($soapClient);

        $response = $handleClient->getList();

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

}