<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class InfoResponseItem
{
    /**
     * @var string
     */
    private $domainName;

    /**
     * @var string
     */
    private $tld;

    /**
     * @var string
     */
    private $adminC;

    /**
     * @var string
     */
    private $ownerC;

    /**
     * @var string
     */
    private $techC;

    /**
     * @var string
     */
    private $zoneC;

    /**
     * @var string
     */
    private $primaryNameserver;

    /**
     * @var string[]|null
     */
    private $secondaryNameserver;

    /**
     * @var InfoResponseItemNameserver[]
     */
    private $nameservers;

    /**
     * @var string
     */
    private $reseller;

    /**
     * @var \DateTime|null
     */
    private $orderDate;

    /**
     * @var \DateTime|null
     */
    private $executionDate;

    /**
     * @var \DateTime|null
     */
    private $systemInDate;

    /**
     * @var \DateTime|null
     */
    private $paidUntilDate;

    /**
     * @var \DateTime|null
     */
    private $toBeDeletedDate;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $domainStatus;

    /**
     * @var string[]|null
     */
    private $domainSubStatus;

    /**
     * @var string|integer
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $regType;

    /**
     * @var string|null
     */
    private $remarks;

    /**
     * @var string|null
     */
    private $notifyEmail;

    /**
     * @var string[]|null|string
     */
    private $tags;

    /**
     * @var InfoResponseItemExtension
     */
    private $extension;

    /**
     * @return string
     */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * @param string $domainName
     * @return InfoResponseItem
     */
    public function setDomainName(string $domainName): InfoResponseItem
    {
        $this->domainName = $domainName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTld(): string
    {
        return $this->tld;
    }

    /**
     * @param string $tld
     * @return InfoResponseItem
     */
    public function setTld(string $tld): InfoResponseItem
    {
        $this->tld = $tld;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdminC(): string
    {
        return $this->adminC;
    }

    /**
     * @param string $adminC
     * @return InfoResponseItem
     */
    public function setAdminC(string $adminC): InfoResponseItem
    {
        $this->adminC = $adminC;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerC(): string
    {
        return $this->ownerC;
    }

    /**
     * @param string $ownerC
     * @return InfoResponseItem
     */
    public function setOwnerC(string $ownerC): InfoResponseItem
    {
        $this->ownerC = $ownerC;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechC(): string
    {
        return $this->techC;
    }

    /**
     * @param string $techC
     * @return InfoResponseItem
     */
    public function setTechC(string $techC): InfoResponseItem
    {
        $this->techC = $techC;
        return $this;
    }

    /**
     * @return string
     */
    public function getZoneC(): string
    {
        return $this->zoneC;
    }

    /**
     * @param string $zoneC
     * @return InfoResponseItem
     */
    public function setZoneC(string $zoneC): InfoResponseItem
    {
        $this->zoneC = $zoneC;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryNameserver(): string
    {
        return $this->primaryNameserver;
    }

    /**
     * @param string $primaryNameserver
     * @return InfoResponseItem
     */
    public function setPrimaryNameserver(string $primaryNameserver): InfoResponseItem
    {
        $this->primaryNameserver = $primaryNameserver;
        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getSecondaryNameserver()
    {
        return $this->secondaryNameserver;
    }

    /**
     * @param null|string[] $secondaryNameserver
     * @return InfoResponseItem
     */
    public function setSecondaryNameserver($secondaryNameserver)
    {
        $this->secondaryNameserver = $secondaryNameserver;
        return $this;
    }

    /**
     * @return InfoResponseItemNameserver[]
     */
    public function getNameservers(): array
    {
        return $this->nameservers;
    }

    /**
     * @param InfoResponseItemNameserver[] $nameservers
     * @return InfoResponseItem
     */
    public function setNameservers(array $nameservers): InfoResponseItem
    {
        $this->nameservers = $nameservers;
        return $this;
    }

    /**
     * @return string
     */
    public function getReseller(): string
    {
        return $this->reseller;
    }

    /**
     * @param string $reseller
     * @return InfoResponseItem
     */
    public function setReseller(string $reseller): InfoResponseItem
    {
        $this->reseller = $reseller;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param \DateTime|null $orderDate
     * @return InfoResponseItem
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExecutionDate()
    {
        return $this->executionDate;
    }

    /**
     * @param \DateTime|null $executionDate
     * @return InfoResponseItem
     */
    public function setExecutionDate($executionDate)
    {
        $this->executionDate = $executionDate;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSystemInDate()
    {
        return $this->systemInDate;
    }

    /**
     * @param \DateTime|null $systemInDate
     * @return InfoResponseItem
     */
    public function setSystemInDate($systemInDate)
    {
        $this->systemInDate = $systemInDate;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPaidUntilDate()
    {
        return $this->paidUntilDate;
    }

    /**
     * @param \DateTime|null $paidUntilDate
     * @return InfoResponseItem
     */
    public function setPaidUntilDate($paidUntilDate)
    {
        $this->paidUntilDate = $paidUntilDate;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getToBeDeletedDate()
    {
        return $this->toBeDeletedDate;
    }

    /**
     * @param \DateTime|null $toBeDeletedDate
     * @return InfoResponseItem
     */
    public function setToBeDeletedDate($toBeDeletedDate)
    {
        $this->toBeDeletedDate = $toBeDeletedDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return InfoResponseItem
     */
    public function setStatus(string $status): InfoResponseItem
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomainStatus(): string
    {
        return $this->domainStatus;
    }

    /**
     * @param string $domainStatus
     * @return InfoResponseItem
     */
    public function setDomainStatus(string $domainStatus): InfoResponseItem
    {
        $this->domainStatus = $domainStatus;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getDomainSubStatus()
    {
        return $this->domainSubStatus;
    }

    /**
     * @param string[]|null $domainSubStatus
     * @return InfoResponseItem
     */
    public function setDomainSubStatus($domainSubStatus): InfoResponseItem
    {
        $this->domainSubStatus = $domainSubStatus;
        return $this;
    }

    /**
     * @return string|integer
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string|integer $orderNumber
     * @return InfoResponseItem
     */
    public function setOrderNumber($orderNumber): InfoResponseItem
    {
        $this->orderNumber = (string) $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegType(): string
    {
        return $this->regType;
    }

    /**
     * @param string $regType
     * @return InfoResponseItem
     */
    public function setRegType(string $regType): InfoResponseItem
    {
        $this->regType = $regType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param null|string $remarks
     * @return InfoResponseItem
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNotifyEmail()
    {
        return $this->notifyEmail;
    }

    /**
     * @param null|string $notifyEmail
     * @return InfoResponseItem
     */
    public function setNotifyEmail($notifyEmail)
    {
        $this->notifyEmail = $notifyEmail;
        return $this;
    }

    /**
     * @return null|string[]|string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param null|string[]|string $tags
     * @return InfoResponseItem
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return InfoResponseItemExtension
     */
    public function getExtension(): InfoResponseItemExtension
    {
        return $this->extension;
    }

    /**
     * @param InfoResponseItemExtension $extension
     * @return InfoResponseItem
     */
    public function setExtension(InfoResponseItemExtension $extension): InfoResponseItem
    {
        $this->extension = $extension;
        return $this;
    }
}