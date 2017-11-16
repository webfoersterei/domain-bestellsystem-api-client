<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class ListResponse extends AbstractResponse
{

    /**
     * @var ListResponseItem[]
     */
    private $handleList;

    /**
     * @return ListResponseItem[]
     */
    public function getHandleList(): array
    {
        return $this->handleList;
    }

    /**
     * @param ListResponseItem[] $handleList
     * @return ListResponse
     */
    public function setHandleList(array $handleList): ListResponse
    {
        $this->handleList = $handleList;
        return $this;
    }
}