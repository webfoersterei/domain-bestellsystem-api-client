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
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param null|string $action
     * @return TransferRequest
     */
    public function setAction($action): TransferRequest
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNackReason(): ?string
    {
        return $this->nackReason;
    }

    /**
     * @param null|string $nackReason
     * @return TransferRequest
     */
    public function setNackReason($nackReason): TransferRequest
    {
        $this->nackReason = $nackReason;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAuthCode(): ?string
    {
        return $this->authCode;
    }

    /**
     * @param null|string $authCode
     * @return TransferRequest
     */
    public function setAuthCode($authCode): TransferRequest
    {
        $this->authCode = $authCode;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getNameserver(): ?array
    {
        return $this->nameserver;
    }

    /**
     * @param null|string[] $nameserver
     * @return TransferRequest
     */
    public function setNameserver($nameserver): TransferRequest
    {
        $this->nameserver = $nameserver;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     * @return TransferRequest
     */
    public function setStartDate($startDate): TransferRequest
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getNsEntry(): ?array
    {
        return $this->nsEntry;
    }

    /**
     * @param null|string[] $nsEntry
     * @return TransferRequest
     */
    public function setNsEntry($nsEntry): TransferRequest
    {
        $this->nsEntry = $nsEntry;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    /**
     * @param null|string $remarks
     * @return TransferRequest
     */
    public function setRemarks($remarks): TransferRequest
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getQuoting(): ?string
    {
        return $this->quoting;
    }

    /**
     * @param null|string $quoting
     * @return TransferRequest
     */
    public function setQuoting($quoting): TransferRequest
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
    public function setExtension($extension): TransferRequest
    {
        $this->extension = $extension;

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
     * @return TransferRequest
     */
    public function setNotify($notify): TransferRequest
    {
        $this->notify = $notify;

        return $this;
    }
}