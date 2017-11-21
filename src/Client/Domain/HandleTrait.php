<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


trait HandleTrait
{

    /**
     * @var string
     */
    private $ownerC;

    /**
     * @var string
     */
    private $adminC;

    /**
     * @var string
     */
    private $techC;

    /**
     * @var string
     */
    private $zoneC;

    /**
     * @return string
     */
    public function getOwnerC(): string
    {
        return $this->ownerC;
    }

    /**
     * @param string $ownerC
     * @return $this
     */
    public function setOwnerC(string $ownerC)
    {
        $this->ownerC = $ownerC;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdminC(): string
    {
        return $this->adminC;
    }

    /**
     * @param string $adminC
     * @return $this
     */
    public function setAdminC(string $adminC)
    {
        $this->adminC = $adminC;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechC(): string
    {
        return $this->techC;
    }

    /**
     * @param string $techC
     * @return $this
     */
    public function setTechC(string $techC)
    {
        $this->techC = $techC;
        return $this;
    }

    /**
     * @return string
     */
    public function getZoneC(): string
    {
        return $this->zoneC;
    }

    /**
     * @param string $zoneC
     * @return $this
     */
    public function setZoneC(string $zoneC)
    {
        $this->zoneC = $zoneC;
        return $this;
    }
}