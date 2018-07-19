<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class DnsSecDSData
{
    use DnsSecTrait;

    /**
     * @var string|null
     */
    private $keyTag;

    /**
     * @var string|null
     */
    private $digest;

    /**
     * @return null|string
     */
    public function getKeyTag(): ?string
    {
        return $this->keyTag;
    }

    /**
     * @param null|string $keyTag
     * @return DnsSecDSData
     */
    public function setKeyTag(?string $keyTag): DnsSecDSData
    {
        $this->keyTag = $keyTag;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDigest(): ?string
    {
        return $this->digest;
    }

    /**
     * @param null|string $digest
     * @return DnsSecDSData
     */
    public function setDigest(?string $digest): DnsSecDSData
    {
        $this->digest = $digest;

        return $this;
    }
}