<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


class ListResponseItem
{
    /**
     * @var string
     */
    private $handleId;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $company;

    /**
     * @return string
     */
    public function getHandleId(): string
    {
        return $this->handleId;
    }

    /**
     * @param string $handleId
     * @return ListResponseItem
     */
    public function setHandleId(string $handleId): ListResponseItem
    {
        $this->handleId = $handleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return ListResponseItem
     */
    public function setFirstname(string $firstname): ListResponseItem
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return ListResponseItem
     */
    public function setLastname(string $lastname): ListResponseItem
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return ListResponseItem
     */
    public function setCompany(string $company): ListResponseItem
    {
        $this->company = $company;
        return $this;
    }
}