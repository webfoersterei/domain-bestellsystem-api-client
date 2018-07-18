<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Tests;


use Webfoersterei\DomainBestellSystemApiClient\ClientFactory;

class SoapMockClientFactory extends ClientFactory
{

    private static $soapClient;

    public static function setSoapClient($soapMock)
    {
        self::$soapClient = $soapMock;
    }

    /**
     * Wrapper to allow injection of own mocked SoapClients to apiClients in tests
     * @inheritdoc
     */
    protected static function createSoapClient($url, $username, $password)
    {
        return self::$soapClient;
    }

}