<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 18.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;


class DebugClientFactory extends ClientFactory
{

    // trace leads to the ability of logging original low-level soap XML-Request and response
    protected static $defaultSoapClientOptions = ['trace' => 1];
    
    /**
     * @inheritdoc
     */
    protected static function createLogger($file = 'php://stdin'): LoggerInterface
    {
        $logger = new Logger('debug_logger');
        $logger->pushHandler(new StreamHandler($file, LogLevel::DEBUG));

        return $logger;
    }
}