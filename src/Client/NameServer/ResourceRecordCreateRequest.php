<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 28.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecordCreateRequest
{
    /**
     * @var ResourceRecord[]
     */
    private $rr;

    /**
     * @return ResourceRecord[]
     */
    public function getRr(): array
    {
        return $this->rr;
    }

    /**
     * @param ResourceRecord[] $rr
     * @return ResourceRecordCreateRequest
     */
    public function setRr(array $rr): ResourceRecordCreateRequest
    {
        $this->rr = $rr;

        return $this;
    }

}