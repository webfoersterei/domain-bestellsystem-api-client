<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 20.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class CreateResponse extends AbstractResponse
{
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
    public function setHandleId(string $handleId): CreateResponse
    {
        $this->handleId = $handleId;
        return $this;
    }

}