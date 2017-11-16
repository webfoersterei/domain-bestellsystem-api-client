<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


use Webfoersterei\DomainBestellSystemApiClient\AbstractResponse;

class InfoResponse extends AbstractResponse
{
    use NameTrait;

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
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $handle;

    /**
     * @var string
     */
    private $reseller;

    /**
     * @var InfoResponseExtension
     */
    private $extension;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return InfoResponse
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

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     * @return $this
     */
    public function setHandle(string $handle)
    {
        $this->handle = $handle;
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
     * @return $this
     */
    public function setReseller(string $reseller)
    {
        $this->reseller = $reseller;
        return $this;
    }

    /**
     * @return InfoResponseExtension
     */
    public function getExtension(): InfoResponseExtension
    {
        return $this->extension;
    }

    /**
     * @param InfoResponseExtension $extension
     * @return $this
     */
    public function setExtension(InfoResponseExtension $extension)
    {
        $this->extension = $extension;
        return $this;
    }
}