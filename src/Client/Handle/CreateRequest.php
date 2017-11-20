<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 20.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


class CreateRequest
{
    use NameTrait;
    use AddressTrait;
    use ContactTrait;
    use ExtensionTrait;

    /**
     * @var bool
     */
    private $forceNew = false;

    /**
     * @return bool
     */
    public function isForceNew(): bool
    {
        return $this->forceNew;
    }

    /**
     * @param bool $forceNew
     * @return $this
     */
    public function setForceNew(bool $forceNew): CreateRequest
    {
        $this->forceNew = $forceNew;
        return $this;
    }

}