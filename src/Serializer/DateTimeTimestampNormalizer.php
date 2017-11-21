<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Serializer;


use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class DateTimeTimestampNormalizer extends DateTimeNormalizer
{
    /**
     * @param mixed $data
     * @param string $class
     * @param null $format
     * @param array $context
     * @return bool|\DateTime|\DateTimeImmutable
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     * @throws \Symfony\Component\Serializer\Exception\RuntimeException
     * @throws \Symfony\Component\Serializer\Exception\LogicException
     * @throws \Symfony\Component\Serializer\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Serializer\Exception\ExtraAttributesException
     * @throws \Symfony\Component\Serializer\Exception\BadMethodCallException
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if ('' === $data) return null;

        return parent::denormalize($data, $class, $format, $context);
    }
}