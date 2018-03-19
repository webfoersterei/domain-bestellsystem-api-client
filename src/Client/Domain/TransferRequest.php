<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 22.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class TransferRequest
{
    use HandleTrait;

    /**
     * @var string|null
     */
    private $action;

    /**
     * @var string|null
     */
    private $nackReason;

    /**
     * @var string|null
     */
    private $authCode;

    /**
     * @var string[]|null
     */
    private $nameserver;

    /**
     * @var string
     */
    private $domainName;

    /**
     * @var \DateTime|null
     */
    private $startDate;

    /**
     * @var string[]|null
     */
    private $nsEntry;

    /**
     * @var string|null
     */
    private $remarks;

    /**
     * @var string|null
     */
    private $quoting;

    /**
     * @var string|null
     */
    private $notify;

    /**
     * @var TransferExtension|null
     */
    private $extension;

    /**
     * @return null|string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param null|string $action
     * @return TransferRequest
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNackReason()
    {
        return $this->nackReason;
    }

    /**
     * @param null|string $nackReason
     * @return TransferRequest
     */
    public function setNackReason($nackReason)
    {
        $this->nackReason = $nackReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param null|string $authCode
     * @return TransferRequest
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getNameserver()
    {
        return $this->nameserver;
    }

    /**
     * @param null|string[] $nameserver
     * @return TransferRequest
     */
    public function setNameserver($nameserver)
    {
        $this->nameserver = $nameserver;

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
     * @return TransferRequest
     */
    public function setDomainName(string $domainName): TransferRequest
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     * @return TransferRequest
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getNsEntry()
    {
        return $this->nsEntry;
    }

    /**
     * @param null|string[] $nsEntry
     * @return TransferRequest
     */
    public function setNsEntry($nsEntry)
    {
        $this->nsEntry = $nsEntry;

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
     * @return TransferRequest
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
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
     * @return TransferRequest
     */
    public function setQuoting($quoting)
    {
        $this->quoting = $quoting;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     * @return TransferRequest
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * @param null|string $notify
     * @return TransferRequest
     */
    public function setNotify($notify)
    {
        $this->notify = $notify;

        return $this;
    }
}