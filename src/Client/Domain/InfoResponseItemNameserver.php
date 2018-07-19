<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class InfoResponseItemNameserver
{

    /**
     * @var string
     */
    private $ns;

    /**
     * @var string|null
     */
    private $ipv4;

    /**
     * @var string|null
     */
    private $ipv6;

    /**
     * @return string
     */
    public function getNs(): string
    {
        return $this->ns;
    }

    /**
     * @param string $ns
     * @return $this
     */
    public function setNs(string $ns): InfoResponseItemNameserver
    {
        $this->ns = $ns;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIpv4(): ?string
    {
        return $this->ipv4;
    }

    /**
     * @param null|string $ipv4
     * @return $this
     */
    public function setIpv4($ipv4)
    {
        $this->ipv4 = $ipv4;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIpv6(): ?string
    {
        return $this->ipv6;
    }

    /**
     * @param null|string $ipv6
     * @return $this
     */
    public function setIpv6($ipv6)
    {
        $this->ipv6 = $ipv6;
        return $this;
    }

}