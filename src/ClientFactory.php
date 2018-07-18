<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date   14.12.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\HandleClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;
use Webfoersterei\DomainBestellSystemApiClient\Serializer\DateTimeTimestampNormalizer;


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
        $objectNormalizer->setSerializer($serializer);

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

        $objectNormalizer = static::createObjectNormalizer();
        $normalizers = [new DateTimeTimestampNormalizer(), $objectNormalizer, new ArrayDenormalizer()];
        $encoders = [new JsonEncoder()];

        $serializer = new Serializer($normalizers, $encoders);
        $objectNormalizer->setSerializer($serializer);

        return $serializer;
    }

    /**
     * @return ObjectNormalizer
     */
    protected static function createObjectNormalizer(): ObjectNormalizer
    {
        $extractor = new PhpDocExtractor();

        return new ObjectNormalizer(null, null, null, $extractor);
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
        $objectNormalizer->setSerializer($serializer);

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
        $objectNormalizer->setSerializer($serializer);

        return new NameServerClient($soapClient, $serializer, $objectNormalizer);
    }

}