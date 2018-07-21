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
     * CreateRequest constructor.
     */
    public function __construct()
    {
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
}