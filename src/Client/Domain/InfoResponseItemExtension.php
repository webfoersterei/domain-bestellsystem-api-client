<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Domain;


class InfoResponseItemExtension
{
    /**
     * @var string|null
     */
    private $ownerCWPP;

    /**
     * @var string|null
     */
    private $adminCWPP;

    /**
     * @var string|null
     */
    private $techCWPP;

    /**
     * @var string|null
     */
    private $zoneCWPP;

    /**
     * @return null|string
     */
    public function getOwnerCWPP()
    {
        return $this->ownerCWPP;
    }

    /**
     * @param null|string $ownerCWPP
     * @return $this
     */
    public function setOwnerCWPP($ownerCWPP)
    {
        $this->ownerCWPP = $ownerCWPP;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdminCWPP()
    {
        return $this->adminCWPP;
    }

    /**
     * @param null|string $adminCWPP
     * @return $this
     */
    public function setAdminCWPP($adminCWPP)
    {
        $this->adminCWPP = $adminCWPP;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTechCWPP()
    {
        return $this->techCWPP;
    }

    /**
     * @param null|string $techCWPP
     * @return $this
     */
    public function setTechCWPP($techCWPP)
    {
        $this->techCWPP = $techCWPP;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getZoneCWPP()
    {
        return $this->zoneCWPP;
    }

    /**
     * @param null|string $zoneCWPP
     * @return $this
     */
    public function setZoneCWPP($zoneCWPP)
    {
        $this->zoneCWPP = $zoneCWPP;
        return $this;
    }

}