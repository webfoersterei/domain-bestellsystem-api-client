<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 22.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class ListResponseItem
{
    /**
     * @var string
     */
    private $domainName;

    /**
     * @var string
     */
    private $tld;

    /**
     * @var string
     */
    private $reseller;

    /**
     * @return string
     */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * @param string $domainName
     * @return ListResponseItem
     */
    public function setDomainName(string $domainName): ListResponseItem
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTld(): string
    {
        return $this->tld;
    }

    /**
     * @param string $tld
     * @return ListResponseItem
     */
    public function setTld(string $tld): ListResponseItem
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * @return string
     */
    public function getReseller(): string
    {
        return $this->reseller;
    }

    /**
     * @param string $reseller
     * @return ListResponseItem
     */
    public function setReseller(string $reseller): ListResponseItem
    {
        $this->reseller = $reseller;

        return $this;
    }
}