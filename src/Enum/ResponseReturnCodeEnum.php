<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Enum;


use Webfoersterei\DomainBestellSystemApiClient\Exception\ResponseException;
use Webfoersterei\DomainBestellSystemApiClient\Exception\UnknownCommandResponseException;

class ResponseReturnCodeEnum extends AbstractEnum
{
    public const OK = 1000;
    public const UNKNOWN_COMMAND = 2000;
    public const INVALID_PARAMETER = 2004;

    protected static $values = [
        self::OK => null,
        self::UNKNOWN_COMMAND => UnknownCommandResponseException::class,
        self::INVALID_PARAMETER => ResponseException::class
    ];

}