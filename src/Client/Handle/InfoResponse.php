<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class InfoResponse extends AbstractResponse
{
    use BasicTrait;
    use NameTrait;
    use AddressTrait;
    use ContactTrait;

    /**
     * @var string
     */
    private $reseller;

    /**
     * @return string
     */
    public function getReseller(): string
    {
        return $this->reseller;
    }

    /**
     * @param string $reseller
     * @return $this
     */
    public function setReseller(string $reseller)
    {
        $this->reseller = $reseller;
        return $this;
    }
}