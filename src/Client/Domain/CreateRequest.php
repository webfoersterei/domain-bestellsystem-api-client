<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class CreateRequest
{
    use HandleTrait;

    /**
     * @var string[]
     */
    private $nameserver;

    /**
     * @var string[]|null
     */
    private $nsEntry;

    /**
     * @var string
     */
    private $domainName;

    /**
     * CreateRequest constructor.
     * @param $domainName
     */
    public function __construct($domainName)
    {
        $this->setDomainName($domainName);
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
     * @return CreateRequest
     */
    public function setNameserver(array $nameserver): CreateRequest
    {
        $this->nameserver = $nameserver;
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
     * @return CreateRequest
     */
    public function setNsEntry($nsEntry): CreateRequest
    {
        $this->nsEntry = $nsEntry;
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
     * @return CreateRequest
     */
    public function setDomainName(string $domainName): CreateRequest
    {
        $this->domainName = $domainName;
        return $this;
    }
}