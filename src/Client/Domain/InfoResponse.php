<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class InfoResponse extends AbstractResponse
{
    /**
     * @var InfoResponseItem[]
     */
    private $domainsList;

    /**
     * @return InfoResponseItem[]
     */
    public function getDomainsList(): array
    {
        return $this->domainsList;
    }

    /**
     * @param InfoResponseItem[] $domainsList
     * @return InfoResponse
     */
    public function setDomainsList(array $domainsList): InfoResponse
    {
        $this->domainsList = $domainsList;
        return $this;
    }

}