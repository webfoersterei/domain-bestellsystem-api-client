<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date   14.12.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webfoersterei\DomainBestellSystemApiClient\Client\DomainClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\HandleClient;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServerClient;
use Webfoersterei\DomainBestellSystemApiClient\Serializer\DateTimeTimestampNormalizer;
use Webfoersterei\DomainBestellSystemApiClient\Serializer\ApiItemArrayNormalizer;


/**
 * Class ClientFactory
 * @package Webfoersterei\DomainBestellSystemApiClient
 */
class ClientFactory
{
    protected static $defaultSoapClientOptions = [];

    /**
     * @var LoggerInterface
     */
    protected static $logger;

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

        $domainClient = new DomainClient($soapClient, $serializer);
        $domainClient->setLogger(static::getLogger());

        return $domainClient;
    }

    /**
     * @param $url
     * @param $username
     * @param $password
     * @return \SoapClient
     */
    protected static function createSoapClient($url, $username, $password): \SoapClient
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
        $normalizers = [
            new DateTimeTimestampNormalizer(),
            $objectNormalizer,
            new ApiItemArrayNormalizer(),
            new ArrayDenormalizer(),
        ];
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
     * @return LoggerInterface
     */
    protected static function getLogger(): LoggerInterface
    {
        if (!static::$logger) {
            static::setLogger(static::createLogger());
        }

        return static::$logger;
    }

    /**
     * @param LoggerInterface $logger
     */
    public static function setLogger(LoggerInterface $logger): void
    {
        static::$logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    protected static function createLogger(): LoggerInterface
    {
        return new NullLogger();
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

        $handleClient = new HandleClient($soapClient, $serializer);
        $handleClient->setLogger(static::getLogger());

        return $handleClient;
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

        $nameServerClient = new NameServerClient($soapClient, $serializer);
        $nameServerClient->setLogger(static::getLogger());

        return $nameServerClient;
    }

}