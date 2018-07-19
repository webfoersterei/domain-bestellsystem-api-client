<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class DnsSecKeyData
{
    use DnsSecTrait;

    /**
     * @var string|null
     */
    private $keyFlag;

    /**
     * @var string|null
     */
    private $key;

    /**
     * @return null|string
     */
    public function getKeyFlag(): ?string
    {
        return $this->keyFlag;
    }

    /**
     * @param null|string $keyFlag
     * @return DnsSecKeyData
     */
    public function setKeyFlag(?string $keyFlag): DnsSecKeyData
    {
        $this->keyFlag = $keyFlag;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param null|string $key
     * @return DnsSecKeyData
     */
    public function setKey(?string $key): DnsSecKeyData
    {
        $this->key = $key;

        return $this;
    }
}