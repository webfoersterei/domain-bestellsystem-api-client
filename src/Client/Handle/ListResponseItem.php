<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


class ListResponseItem
{
    use NameTrait;

    /**
     * @var string
     */
    private $handleId;

    /**
     * @return string
     */
    public function getHandleId(): string
    {
        return $this->handleId;
    }

    /**
     * @param string $handleId
     * @return $this
     */
    public function setHandleId(string $handleId)
    {
        $this->handleId = $handleId;
        return $this;
    }
}