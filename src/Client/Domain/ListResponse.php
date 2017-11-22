<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 22.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class ListResponse extends AbstractResponse
{
    /**
     * @var ListResponseItem[]|null
     */
    private $domainsList;

    /**
     * @return null|ListResponseItem[]
     */
    public function getDomainsList()
    {
        return $this->domainsList;
    }

    /**
     * @param null|ListResponseItem[] $domainsList
     * @return ListResponse
     */
    public function setDomainsList($domainsList)
    {
        $this->domainsList = $domainsList;
        return $this;
    }
}