<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 27.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class ZoneInfoResponse extends AbstractResponse
{
    /**
     * @var string
     */
    private $origin;

    /**
     * @var string|integer
     */
    private $refresh;

    /**
     * @var string|integer
     */
    private $retry;

    /**
     * @var string|integer
     */
    private $expire;

    /**
     * @var string|integer
     */
    private $ttl;

    /**
     * @var string|integer
     */
    private $minimumTtl;

    /**
     * @var ResourceRecord[]|null
     */
    private $rrList;

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     * @return $this
     */
    public function setOrigin(string $origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * @param int|string $retry
     * @return ZoneInfoResponse
     */
    public function setRetry($retry): ZoneInfoResponse
    {
        $this->retry = $retry;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * @param int|string $expire
     * @return ZoneInfoResponse
     */
    public function setExpire($expire): ZoneInfoResponse
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * @return null|ResourceRecord[]
     */
    public function getRrList(): ?array
    {
        return $this->rrList;
    }

    /**
     * @param null|ResourceRecord[] $rrList
     * @return ZoneInfoResponse
     */
    public function setRrList($rrList): ZoneInfoResponse
    {
        $this->rrList = $rrList;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRefresh()
    {
        return $this->refresh;
    }

    /**
     * @param int|string $refresh
     * @return ZoneInfoResponse
     */
    public function setRefresh($refresh): ZoneInfoResponse
    {
        $this->refresh = $refresh;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param int|string $ttl
     * @return ZoneInfoResponse
     */
    public function setTtl($ttl): ZoneInfoResponse
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMinimumTtl()
    {
        return $this->minimumTtl;
    }

    /**
     * @param int|string $minimumTtl
     * @return ZoneInfoResponse
     */
    public function setMinimumTtl($minimumTtl): ZoneInfoResponse
    {
        $this->minimumTtl = $minimumTtl;

        return $this;
    }
}