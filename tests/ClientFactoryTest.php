<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date   14.12.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests;

use PHPUnit\Framework\TestCase;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\HandleClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;
use Webfoersterei\DomainBestellSystemApiClient\ClientFactory;

class ClientFactoryTest extends TestCase
{

    public function testCreateDomainClient()
    {
        $domainClient = ClientFactory::createDomainClient(
            __DIR__.'/Resources/domain-bestellsystem.wsdl',
            'username',
            'password'
        );

        $this->assertInstanceOf(DomainClient::class, $domainClient);
    }

    public function testCreateHandleClient()
    {
        $domainClient = ClientFactory::createHandleClient(
            __DIR__.'/Resources/domain-bestellsystem.wsdl',
            'username',
            'password'
        );

        $this->assertInstanceOf(HandleClient::class, $domainClient);
    }

    public function testCreateNameServerClient()
    {
        $domainClient = ClientFactory::createNameServerClient(
            __DIR__.'/Resources/domain-bestellsystem.wsdl',
            'username',
            'password'
        );

        $this->assertInstanceOf(NameServerClient::class, $domainClient);
    }

}
