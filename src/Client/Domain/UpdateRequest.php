<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class UpdateRequest
{
    use HandleTrait;

    /**
     * @var string|null
     */
    private $remarks;

    /**
     * @var array|string[]|null
     */
    private $nsEntry;

    /**
     * @var string|null
     */
    private $quoting;

    /**
     * @var string|null
     */
    private $domainNameAce;

    /**
     * @var string
     */
    private $notify;

    /**
     * @var string
     */
    private $domainName;

    /**
     * @var string[]
     */
    private $nameserver;

    /**
     * UpdateRequest constructor.
     * @param string $domainName
     */
    public function __construct(string $domainName)
    {
        $this->setDomainName($domainName)
            ->setAdminC('NOCHANGE')
            ->setOwnerC('NOCHANGE')
            ->setTechC('NOCHANGE')
            ->setZoneC('NOCHANGE')
            ->setNameserver(['NOCHANGE'])
            ->setNotify('NOCHANGE');
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
     * @return $this
     */
    public function setDomainName(string $domainName): UpdateRequest
    {
        $this->domainName = $domainName;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getNameserver(): array
    {
        return $this->nameserver;
    }

    /**
     * @param string[] $nameserver
     * @return $this
     */
    public function setNameserver(array $nameserver): UpdateRequest
    {
        $this->nameserver = $nameserver;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    /**
     * @param string|null $remarks
     */
    public function setRemarks(?string $remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * @return array|null|string[]
     */
    public function getNsEntry()
    {
        return $this->nsEntry;
    }

    /**
     * @param array|null|string[] $nsEntry
     */
    public function setNsEntry($nsEntry)
    {
        $this->nsEntry = $nsEntry;
    }

    /**
     * @return null|string
     */
    public function getQuoting()
    {
        return $this->quoting;
    }

    /**
     * @param null|string $quoting
     */
    public function setQuoting($quoting)
    {
        $this->quoting = $quoting;
    }

    /**
     * @return null|string
     */
    public function getDomainNameAce()
    {
        return $this->domainNameAce;
    }

    /**
     * @param null|string $domainNameAce
     */
    public function setDomainNameAce($domainNameAce)
    {
        $this->domainNameAce = $domainNameAce;
    }

    /**
     * @return string
     */
    public function getNotify(): string
    {
        return $this->notify;
    }

    /**
     * @param string $notify
     */
    public function setNotify(string $notify)
    {
        $this->notify = $notify;
    }
}