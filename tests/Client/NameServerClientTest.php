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
        $soapClient = $this->getSoapClient('nameserverZoneInfo', $response);
        $nameServerClient = $this->getNameServerClient($soapClient);

        $this->assertInstanceOf(ZoneInfoResponse::class, $nameServerClient->zoneInfo('example.org'));
    }

}