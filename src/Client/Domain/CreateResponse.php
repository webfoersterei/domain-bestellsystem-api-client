<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class CreateResponse extends AbstractResponse
{
    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return CreateResponse
     */
    public function setOrderNumber(string $orderNumber): CreateResponse
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }
}