<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


trait BasicTrait
{

    /**
     * @var string
     */
    private $handle;

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return $this
     */
    public function setHandle(string $handle)
    {
        $this->handle = $handle;
        return $this;
    }

}