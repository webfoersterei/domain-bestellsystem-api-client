<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class InfoResponseItemExtension
{
    /**
     * @var string|null
     */
    private $ownerCWPP;

    /**
     * @var string|null
     */
    private $adminCWPP;

    /**
     * @var string|null
     */
    private $techCWPP;

    /**
     * @var string|null
     */
    private $zoneCWPP;

    /**
     * @var DnsSecKeyData[]
     */
    private $dnsSecKeyData;

    /**
     * @var DnsSecDSData[]
     */
    private $dnsSecDSData;

    /**
     * @return null|string
     */
    public function getOwnerCWPP(): ?string
    {
        return $this->ownerCWPP;
    }

    /**
     * @param null|string $ownerCWPP
     * @return $this
     */
    public function setOwnerCWPP($ownerCWPP)
    {
        $this->ownerCWPP = $ownerCWPP;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdminCWPP(): ?string
    {
        return $this->adminCWPP;
    }

    /**
     * @param null|string $adminCWPP
     * @return $this
     */
    public function setAdminCWPP($adminCWPP)
    {
        $this->adminCWPP = $adminCWPP;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechCWPP(): ?string
    {
        return $this->techCWPP;
    }

    /**
     * @param null|string $techCWPP
     * @return $this
     */
    public function setTechCWPP($techCWPP)
    {
        $this->techCWPP = $techCWPP;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getZoneCWPP(): ?string
    {
        return $this->zoneCWPP;
    }

    /**
     * @param null|string $zoneCWPP
     * @return $this
     */
    public function setZoneCWPP($zoneCWPP)
    {
        $this->zoneCWPP = $zoneCWPP;

        return $this;
    }

    /**
     * @return DnsSecKeyData
     */
    public function getDnsSecKeyData(): DnsSecKeyData
    {
        return $this->dnsSecKeyData;
    }

    /**
     * @param DnsSecKeyData $dnsSecKeyData
     * @return InfoResponseItemExtension
     */
    public function setDnsSecKeyData(DnsSecKeyData $dnsSecKeyData): InfoResponseItemExtension
    {
        $this->dnsSecKeyData = $dnsSecKeyData;

        return $this;
    }

    /**
     * @return DnsSecDSData
     */
    public function getDnsSecDSData(): DnsSecDSData
    {
        return $this->dnsSecDSData;
    }

    /**
     * @param DnsSecDSData $dnsSecDSData
     * @return InfoResponseItemExtension
     */
    public function setDnsSecDSData(DnsSecDSData $dnsSecDSData): InfoResponseItemExtension
    {
        $this->dnsSecDSData = $dnsSecDSData;

        return $this;
    }
}