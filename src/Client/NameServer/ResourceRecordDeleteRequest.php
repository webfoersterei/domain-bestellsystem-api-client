<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 28.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecordDeleteRequest
{
    /**
     * @var string
     */
    private $soaOrigin;

    /**
     * @var ResourceRecord
     */
    private $rr;

    /**
     * @return string
     */
    public function getSoaOrigin(): string
    {
        return $this->soaOrigin;
    }

    /**
     * @param string $soaOrigin
     * @return ResourceRecordDeleteRequest
     */
    public function setSoaOrigin(string $soaOrigin): ResourceRecordDeleteRequest
    {
        $this->soaOrigin = $soaOrigin;
        return $this;
    }

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