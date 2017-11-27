<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 27.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecord
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $data;

    /**
     * @var string|null
     */
    private $aux;

    /**
     * @var string
     */
    private $ttl = 86400;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return $this
     */
    public function setData(string $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAux()
    {
        return $this->aux;
    }

    /**
     * @param null|string $aux
     * @return ResourceRecord
     */
    public function setAux($aux)
    {
        $this->aux = $aux;
        return $this;
    }

    /**
     * @return string
     */
    public function getTtl(): string
    {
        return $this->ttl;
    }

    /**
     * @param string $ttl
     * @return $this
     */
    public function setTtl(string $ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ResourceRecord
     */
    public function setName(string $name): ResourceRecord
    {
        $this->name = $name;
        return $this;
    }

}