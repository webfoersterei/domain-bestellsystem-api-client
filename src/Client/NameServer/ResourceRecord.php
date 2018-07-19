<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 27.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\NameServer;


class ResourceRecord
{
    /**
     * @var string|null
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
     * @var null|integer
     */
    private $aux;

    /**
     * @var integer
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
     * @return int|null|string
     */
    public function getAux()
    {
        return $this->aux;
    }

    /**
     * @param int|null|string $aux
     * @return ResourceRecord
     */
    public function setAux($aux)
    {
        $this->aux = $aux;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param int|string $ttl
     * @return ResourceRecord
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ResourceRecord
     */
    public function setName($name): ResourceRecord
    {
        $this->name = $name;

        return $this;
    }

}