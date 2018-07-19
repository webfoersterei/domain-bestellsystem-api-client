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
     * @var string
     */
    private $domainName;

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
     * @return string
     */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * @param string $domainName
     * @return TradeRequest
     */
    public function setDomainName(string $domainName): TradeRequest
    {
        $this->domainName = $domainName;
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