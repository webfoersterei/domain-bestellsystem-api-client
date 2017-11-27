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
     * @var string
     */
    private $refresh;

    /**
     * @var string
     */
    private $retry;

    /**
     * @var string
     */
    private $expire;

    /**
     * @var string
     */
    private $ttl;

    /**
     * @var string
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
     * @return string
     */
    public function getRefresh(): string
    {
        return $this->refresh;
    }

    /**
     * @param string $refresh
     * @return $this
     */
    public function setRefresh(string $refresh)
    {
        $this->refresh = $refresh;
        return $this;
    }

    /**
     * @return string
     */
    public function getRetry(): string
    {
        return $this->retry;
    }

    /**
     * @param string $retry
     * @return $this
     */
    public function setRetry(string $retry)
    {
        $this->retry = $retry;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpire(): string
    {
        return $this->expire;
    }

    /**
     * @param string $expire
     * @return $this
     */
    public function setExpire(string $expire)
    {
        $this->expire = $expire;
        return $this;
    }

    /**
     * @return string
     */
    public function getTtl(): string
    {
        return $this->ttl;
    }

    /**
     * @param string $ttl
     * @return $this
     */
    public function setTtl(string $ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinimumTtl(): string
    {
        return $this->minimumTtl;
    }

    /**
     * @param string $minimumTtl
     * @return $this
     */
    public function setMinimumTtl(string $minimumTtl)
    {
        $this->minimumTtl = $minimumTtl;
        return $this;
    }

    /**
     * @return null|ResourceRecord[]
     */
    public function getRrList()
    {
        return $this->rrList;
    }

    /**
     * @param null|ResourceRecord[] $rrList
     * @return ZoneInfoResponse
     */
    public function setRrList($rrList)
    {
        $this->rrList = $rrList;
        return $this;
    }

}