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

}