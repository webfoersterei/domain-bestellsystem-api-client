<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 17.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


class InfoResponseExtension
{
    /**
     * @var string
     */
    private $vatId;

    /**
     * @var string
     */
    private $companyId;

    /**
     * @var string
     */
    private $personId;

    /**
     * @var string
     */
    private $trademarkId;

    /**
     * @var string
     */
    private $birthplace;

    /**
     * @var \DateTime|null
     */
    private $birthdate;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $atDiscloseVoice;

    /**
     * @var string
     */
    private $atDiscloseFax;

    /**
     * @var string
     */
    private $atDiscloseMail;

    /**
     * @var string
     */
    private $idAuthority;

    /**
     * @var string
     */
    private $companyUrl;

    /**
     * @var string
     */
    private $companyType;

    /**
     * @var string
     */
    private $personJobTitle;

    /**
     * @var string
     */
    private $dunsId;

    /**
     * @var string
     */
    private $xxxId;

    /**
     * @return string
     */
    public function getVatId(): string
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     * @return InfoResponseExtension
     */
    public function setVatId(string $vatId): InfoResponseExtension
    {
        $this->vatId = $vatId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     * @return InfoResponseExtension
     */
    public function setCompanyId(string $companyId): InfoResponseExtension
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonId(): string
    {
        return $this->personId;
    }

    /**
     * @param string $personId
     * @return InfoResponseExtension
     */
    public function setPersonId(string $personId): InfoResponseExtension
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrademarkId(): string
    {
        return $this->trademarkId;
    }

    /**
     * @param string $trademarkId
     * @return $this
     */
    public function setTrademarkId(string $trademarkId)
    {
        $this->trademarkId = $trademarkId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthplace(): string
    {
        return $this->birthplace;
    }

    /**
     * @param string $birthplace
     * @return $this
     */
    public function setBirthplace(string $birthplace)
    {
        $this->birthplace = $birthplace;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthdate(): ?\DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime|null $birthdate
     * @return $this
     */
    public function setBirthdate(?\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getAtDiscloseVoice(): string
    {
        return $this->atDiscloseVoice;
    }

    /**
     * @param string $atDiscloseVoice
     * @return $this
     */
    public function setAtDiscloseVoice(string $atDiscloseVoice)
    {
        $this->atDiscloseVoice = $atDiscloseVoice;
        return $this;
    }

    /**
     * @return string
     */
    public function getAtDiscloseFax(): string
    {
        return $this->atDiscloseFax;
    }

    /**
     * @param string $atDiscloseFax
     * @return $this
     */
    public function setAtDiscloseFax(string $atDiscloseFax)
    {
        $this->atDiscloseFax = $atDiscloseFax;
        return $this;
    }

    /**
     * @return string
     */
    public function getAtDiscloseMail(): string
    {
        return $this->atDiscloseMail;
    }

    /**
     * @param string $atDiscloseMail
     * @return $this
     */
    public function setAtDiscloseMail(string $atDiscloseMail)
    {
        $this->atDiscloseMail = $atDiscloseMail;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdAuthority(): string
    {
        return $this->idAuthority;
    }

    /**
     * @param string $idAuthority
     * @return $this
     */
    public function setIdAuthority(string $idAuthority)
    {
        $this->idAuthority = $idAuthority;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyUrl(): string
    {
        return $this->companyUrl;
    }

    /**
     * @param string $companyUrl
     * @return $this
     */
    public function setCompanyUrl(string $companyUrl)
    {
        $this->companyUrl = $companyUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyType(): string
    {
        return $this->companyType;
    }

    /**
     * @param string $companyType
     * @return $this
     */
    public function setCompanyType(string $companyType)
    {
        $this->companyType = $companyType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonJobTitle(): string
    {
        return $this->personJobTitle;
    }

    /**
     * @param string $personJobTitle
     * @return $this
     */
    public function setPersonJobTitle(string $personJobTitle)
    {
        $this->personJobTitle = $personJobTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getDunsId(): string
    {
        return $this->dunsId;
    }

    /**
     * @param string $dunsId
     * @return $this
     */
    public function setDunsId(string $dunsId)
    {
        $this->dunsId = $dunsId;
        return $this;
    }

    /**
     * @return string
     */
    public function getXxxId(): string
    {
        return $this->xxxId;
    }

    /**
     * @param string $xxxId
     * @return $this
     */
    public function setXxxId(string $xxxId)
    {
        $this->xxxId = $xxxId;
        return $this;
    }
}