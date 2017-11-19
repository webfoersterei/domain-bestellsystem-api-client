<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


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
     * @return CheckResponse
     */
    public function setAvailable(bool $available): CheckResponse
    {
        $this->available = $available;
        return $this;
    }
}