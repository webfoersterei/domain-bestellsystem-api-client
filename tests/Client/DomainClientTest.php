<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.03.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class DomainClientTest extends AbstractClientTest
{
    public function testBasicJson()
    {
        $response = file_get_contents(__DIR__.'/../Resources/DomainClient/domainCheck_response_01.xml');
        $soapClient = $this->getSoapClient('domainCheck', $response);
        $domainClient = $this->getDomainClient($soapClient);

        $this->assertInstanceOf(CheckResponse::class, $domainClient->check('webfoersterei.de'));
    }

}