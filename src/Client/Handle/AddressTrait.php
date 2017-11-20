<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


trait AddressTrait
{

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $pcode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;


    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getPcode(): string
    {
        return $this->pcode;
    }

    /**
     * @param string $pcode
     * @return $this
     */
    public function setPcode(string $pcode)
    {
        $this->pcode = $pcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }
}