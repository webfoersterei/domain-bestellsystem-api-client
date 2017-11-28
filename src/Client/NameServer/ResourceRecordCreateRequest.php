<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 28.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecordCreateRequest
{
    /**
     * @var string
     */
    private $soaOrigin;

    /**
     * @var ResourceRecord[]
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
     * @return ResourceRecordCreateRequest
     */
    public function setSoaOrigin(string $soaOrigin): ResourceRecordCreateRequest
    {
        $this->soaOrigin = $soaOrigin;
        return $this;
    }

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