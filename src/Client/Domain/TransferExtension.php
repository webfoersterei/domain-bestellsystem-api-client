<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 26.02.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class TransferExtension
{
    /**
     * @var string|null
     */
    private $ukNewTag;

    /**
     * @var string|null
     */
    private $adminCTrustee;

    /**
     * @var string|null
     */
    private $ownerCTrustee;

    /**
     * @var string|null
     */
    private $techCTrustee;

    /**
     * @var string|null
     */
    private $zoneCTrustee;

    /**
     * @var string|null
     */
    private $adminCWPP;

    /**
     * @var string|null
     */
    private $ownerCWPP;

    /**
     * @var string|null
     */
    private $techCWPP;

    /**
     * @var string|null
     */
    private $zoneCWPP;

    /**
     * @var []string|null
     */
    private $asiaCEDHandle;

    /**
     * @var string|null
     */
    private $claimNoticeId;

    /**
     * @var string|null
     */
    private $claimNoticeExpiryDate;

    /**
     * @var string|null
     */
    private $claimNoticeAcceptedDate;

    /**
     * @var array|null
     */
    private $dnsSecKeyData;

    /**
     * @var array|null
     */
    private $dnsSecDSData;

    /**
     * @var string|null
     */
    private $seIDNumber;

    /**
     * @return null|string
     */
    public function getUkNewTag(): ?string
    {
        return $this->ukNewTag;
    }

    /**
     * @param null|string $ukNewTag
     * @return TransferExtension
     */
    public function setUkNewTag(?string $ukNewTag): TransferExtension
    {
        $this->ukNewTag = $ukNewTag;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdminCTrustee(): ?string
    {
        return $this->adminCTrustee;
    }

    /**
     * @param null|string $adminCTrustee
     * @return TransferExtension
     */
    public function setAdminCTrustee(?string $adminCTrustee): TransferExtension
    {
        $this->adminCTrustee = $adminCTrustee;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOwnerCTrustee(): ?string
    {
        return $this->ownerCTrustee;
    }

    /**
     * @param null|string $ownerCTrustee
     * @return TransferExtension
     */
    public function setOwnerCTrustee(?string $ownerCTrustee): TransferExtension
    {
        $this->ownerCTrustee = $ownerCTrustee;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechCTrustee(): ?string
    {
        return $this->techCTrustee;
    }

    /**
     * @param null|string $techCTrustee
     * @return TransferExtension
     */
    public function setTechCTrustee(?string $techCTrustee): TransferExtension
    {
        $this->techCTrustee = $techCTrustee;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getZoneCTrustee(): ?string
    {
        return $this->zoneCTrustee;
    }

    /**
     * @param null|string $zoneCTrustee
     * @return TransferExtension
     */
    public function setZoneCTrustee(?string $zoneCTrustee): TransferExtension
    {
        $this->zoneCTrustee = $zoneCTrustee;

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
     * @return TransferExtension
     */
    public function setAdminCWPP(?string $adminCWPP): TransferExtension
    {
        $this->adminCWPP = $adminCWPP;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOwnerCWPP(): ?string
    {
        return $this->ownerCWPP;
    }

    /**
     * @param null|string $ownerCWPP
     * @return TransferExtension
     */
    public function setOwnerCWPP(?string $ownerCWPP): TransferExtension
    {
        $this->ownerCWPP = $ownerCWPP;

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
     * @return TransferExtension
     */
    public function setTechCWPP(?string $techCWPP): TransferExtension
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
     * @return TransferExtension
     */
    public function setZoneCWPP(?string $zoneCWPP): TransferExtension
    {
        $this->zoneCWPP = $zoneCWPP;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsiaCEDHandle()
    {
        return $this->asiaCEDHandle;
    }

    /**
     * @param mixed $asiaCEDHandle
     * @return TransferExtension
     */
    public function setAsiaCEDHandle($asiaCEDHandle): TransferExtension
    {
        $this->asiaCEDHandle = $asiaCEDHandle;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClaimNoticeId(): ?string
    {
        return $this->claimNoticeId;
    }

    /**
     * @param null|string $claimNoticeId
     * @return TransferExtension
     */
    public function setClaimNoticeId(?string $claimNoticeId): TransferExtension
    {
        $this->claimNoticeId = $claimNoticeId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClaimNoticeExpiryDate(): ?string
    {
        return $this->claimNoticeExpiryDate;
    }

    /**
     * @param null|string $claimNoticeExpiryDate
     * @return TransferExtension
     */
    public function setClaimNoticeExpiryDate(?string $claimNoticeExpiryDate): TransferExtension
    {
        $this->claimNoticeExpiryDate = $claimNoticeExpiryDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClaimNoticeAcceptedDate(): ?string
    {
        return $this->claimNoticeAcceptedDate;
    }

    /**
     * @param null|string $claimNoticeAcceptedDate
     * @return TransferExtension
     */
    public function setClaimNoticeAcceptedDate(?string $claimNoticeAcceptedDate): TransferExtension
    {
        $this->claimNoticeAcceptedDate = $claimNoticeAcceptedDate;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getDnsSecKeyData(): ?array
    {
        return $this->dnsSecKeyData;
    }

    /**
     * @param array|null $dnsSecKeyData
     * @return TransferExtension
     */
    public function setDnsSecKeyData(?array $dnsSecKeyData): TransferExtension
    {
        $this->dnsSecKeyData = $dnsSecKeyData;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getDnsSecDSData(): ?array
    {
        return $this->dnsSecDSData;
    }

    /**
     * @param array|null $dnsSecDSData
     * @return TransferExtension
     */
    public function setDnsSecDSData(?array $dnsSecDSData): TransferExtension
    {
        $this->dnsSecDSData = $dnsSecDSData;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSeIDNumber(): ?string
    {
        return $this->seIDNumber;
    }

    /**
     * @param null|string $seIDNumber
     * @return TransferExtension
     */
    public function setSeIDNumber(?string $seIDNumber): TransferExtension
    {
        $this->seIDNumber = $seIDNumber;

        return $this;
    }
}