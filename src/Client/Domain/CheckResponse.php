<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class CheckResponse extends AbstractResponse
{

    /**
     * @var bool
     */
    private $available;

    /**
     * @var string
     */
    private $detailedStatus;

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     * @return $this
     */
    public function setAvailable(bool $available): CheckResponse
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetailedStatus(): string
    {
        return $this->detailedStatus;
    }

    /**
     * @param string $detailedStatus
     * @return CheckResponse
     */
    public function setDetailedStatus(string $detailedStatus): CheckResponse
    {
        $this->detailedStatus = $detailedStatus;

        return $this;
    }

}