<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 24.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ZoneCreateRequest
{
    /**
     * @var string
     */
    private $soaOrigin;

    /**
     * @var string
     */
    private $soaExpire = 604800;

    /**
     * @var string
     */
    private $soaMbox;

    /**
     * @var string
     */
    private $soaMinimum = 86400;

    /**
     * @var string
     */
    private $soaRefresh = 28800;

    /**
     * @var string
     */
    private $soaRetry = 7200;

    /**
     * @var string
     */
    private $soaTtl = 86400;

    /**
     * @var ResourceRecord[]
     */
    private $rr;

    /**
     * @return string
     */
    public function getSoaOrigin(): string
    {
        return $this->soaOrigin;
    }

    /**
     * @param string $soaOrigin
     * @return ZoneCreateRequest
     */
    public function setSoaOrigin(string $soaOrigin): ZoneCreateRequest
    {
        $this->soaOrigin = $soaOrigin;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaExpire(): string
    {
        return $this->soaExpire;
    }

    /**
     * @param string $soaExpire
     * @return ZoneCreateRequest
     */
    public function setSoaExpire(string $soaExpire): ZoneCreateRequest
    {
        $this->soaExpire = $soaExpire;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaMbox(): string
    {
        return $this->soaMbox;
    }

    /**
     * @param string $soaMbox
     * @return ZoneCreateRequest
     */
    public function setSoaMbox(string $soaMbox): ZoneCreateRequest
    {
        $this->soaMbox = $soaMbox;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaMinimum(): string
    {
        return $this->soaMinimum;
    }

    /**
     * @param string $soaMinimum
     * @return ZoneCreateRequest
     */
    public function setSoaMinimum(string $soaMinimum): ZoneCreateRequest
    {
        $this->soaMinimum = $soaMinimum;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaRefresh(): string
    {
        return $this->soaRefresh;
    }

    /**
     * @param string $soaRefresh
     * @return ZoneCreateRequest
     */
    public function setSoaRefresh(string $soaRefresh): ZoneCreateRequest
    {
        $this->soaRefresh = $soaRefresh;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaRetry(): string
    {
        return $this->soaRetry;
    }

    /**
     * @param string $soaRetry
     * @return ZoneCreateRequest
     */
    public function setSoaRetry(string $soaRetry): ZoneCreateRequest
    {
        $this->soaRetry = $soaRetry;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoaTtl(): string
    {
        return $this->soaTtl;
    }

    /**
     * @param string $soaTtl
     * @return ZoneCreateRequest
     */
    public function setSoaTtl(string $soaTtl): ZoneCreateRequest
    {
        $this->soaTtl = $soaTtl;
        return $this;
    }

    /**
     * @return ResourceRecord[]
     */
    public function getRr(): array
    {
        return $this->rr;
    }

    /**
     * @param ResourceRecord[] $rr
     * @return ZoneCreateRequest
     */
    public function setRr(array $rr): ZoneCreateRequest
    {
        $this->rr = $rr;
        return $this;
    }

}