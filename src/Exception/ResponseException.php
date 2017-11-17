<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Exception;


use Throwable;
use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class ResponseException extends Exception
{

    /**
     * @var AbstractResponse
     */
    private $response;

    public function __construct(AbstractResponse $response, Throwable $previous = null)
    {
        parent::__construct($response->getReturnMessage(), $response->getReturnCode(), $previous);
        $this->response = $response;
    }

    /**
     * @return AbstractResponse
     */
    public function getResponse(): AbstractResponse
    {
        return $this->response;
    }

}