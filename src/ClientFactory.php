<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date   14.12.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\HandleClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;


/**
 * Class ClientFactory
 * @package Webfoersterei\DomainBestellSystemApiClient
 */
class ClientFactory
{
    protected static $defaultSoapClientOptions = [];

    /**
     * @param $url
     * @param $username
     * @param $password
     * @return DomainClient
     */
    public static function createDomainClient($url, $username, $password): DomainClient
    {
        $soapClient = static::createSoapClient($url, $username, $password);
        $serializer = static::createSerializer();
        $objectNormalizer = static::createObjectNormalizer();

        return new DomainClient($soapClient, $serializer, $objectNormalizer);
    }

    /**
     * @param $url
     * @param $username
     * @param $password
     * @return \SoapClient
     */
    protected static function createSoapClient($url, $username, $password)
    {
        $soapClientOptions = array_merge(
            static::$defaultSoapClientOptions,
            ['login' => $username, 'password' => $password]
        );

        return new \SoapClient($url, $soapClientOptions);
    }

    /**
     * @return Serializer
     */
    protected static function createSerializer(): Serializer
    {
        return new Serializer();
    }

    /**
     * @return ObjectNormalizer
     */
    protected static function createObjectNormalizer(): ObjectNormalizer
    {
        return new ObjectNormalizer();
    }

    /**
     * @param $url
     * @param $username
     * @param $password
     * @return HandleClient
     */
    public static function createHandleClient($url, $username, $password): HandleClient
    {
        $soapClient = static::createSoapClient($url, $username, $password);
        $serializer = static::createSerializer();
        $objectNormalizer = static::createObjectNormalizer();

        return new HandleClient($soapClient, $serializer, $objectNormalizer);
    }

    /**
     * @param $url
     * @param $username
     * @param $password
     * @return NameServerClient
     */
    public static function createNameServerClient($url, $username, $password): NameServerClient
    {
        $soapClient = static::createSoapClient($url, $username, $password);
        $serializer = static::createSerializer();
        $objectNormalizer = static::createObjectNormalizer();

        return new NameServerClient($soapClient, $serializer, $objectNormalizer);
    }

}