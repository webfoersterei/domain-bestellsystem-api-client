<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.07.18
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


trait DnsSecTrait
{

    /**
     * @var string|null
     */
    private $digestType;

    /**
     * @var string|null
     */
    private $algorithm;

    /**
     * @return null|string
     */
    public function getDigestType(): ?string
    {
        return $this->digestType;
    }

    /**
     * @param null|string $digestType
     * @return $this
     */
    public function setDigestType(?string $digestType)
    {
        $this->digestType = $digestType;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAlgorithm(): ?string
    {
        return $this->algorithm;
    }

    /**
     * @param null|string $algorithm
     * @return $this
     */
    public function setAlgorithm(?string $algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }
}