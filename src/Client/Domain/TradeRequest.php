<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 22.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class TradeRequest
{

    /**
     * @var string
     */
    private $ownerC;

    /**
     * @var string|null
     */
    private $notify;

    /**
     * @return string
     */
    public function getOwnerC(): string
    {
        return $this->ownerC;
    }

    /**
     * @param string $ownerC
     * @return TradeRequest
     */
    public function setOwnerC(string $ownerC): TradeRequest
    {
        $this->ownerC = $ownerC;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNotify(): ?string
    {
        return $this->notify;
    }

    /**
     * @param null|string $notify
     * @return TradeRequest
     */
    public function setNotify($notify): TradeRequest
    {
        $this->notify = $notify;
        return $this;
    }
}