<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.03.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Tests\AbstractClientTest;

class DomainClientTest extends AbstractClientTest
{
    public function testBasicJson()
    {
        $soapClient = $this->getSoapClient('domainCheck', null);
        $domainClient = new DomainClient($soapClient, $this->getSerializer(), $this->getObjectNormalizer());

        $this->assertInstanceOf(CheckResponse::class, $domainClient->check('webfoersterei.de'));
    }

}