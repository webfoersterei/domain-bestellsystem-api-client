<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Enum;


abstract class AbstractEnum
{
    protected static $values = [];

    /**
     * @param string|int $key
     * @return mixed
     */
    public static function getValue($key)
    {
        return static::hasKey($key) ? static::$values[$key] : null;
    }

    /**
     * @param string|int $key
     * @return bool
     */
    public static function hasKey($key): bool
    {
        return array_key_exists($key, static::$values);
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return static::$values;
    }

    /**
     * @return array
     */
    public static function getKeys(): array
    {
        return array_keys(static::$values);
    }
}