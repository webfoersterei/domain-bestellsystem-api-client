<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 28.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecordDeleteRequest
{
    /**
     * @var ResourceRecord
     */
    private $rr;

    /**
     * @return ResourceRecord
     */
    public function getRr(): ResourceRecord
    {
        return $this->rr;
    }

    /**
     * @param ResourceRecord $rr
     * @return ResourceRecordDeleteRequest
     */
    public function setRr(ResourceRecord $rr): ResourceRecordDeleteRequest
    {
        $this->rr = $rr;

        return $this;
    }
}