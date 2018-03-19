<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient;


abstract class AbstractResponse
{

    /**
     * @var integer
     */
    private $returnCode;

    /**
     * @var integer|null
     */
    private $returnSubCode;

    /**
     * @var string|null
     */
    private $returnMessage;

    /**
     * @var string|null
     */
    private $clientTRID;

    /**
     * @var string|null
     */
    private $serverTRID;

    /**
     * @return int|null
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param int $returnCode
     * @return $this
     */
    public function setReturnCode(int $returnCode)
    {
        $this->returnCode = $returnCode;

        return $this;
    }

    /**
     * @return null|integer
     */
    public function getReturnSubCode()
    {
        return $this->returnSubCode;
    }

    /**
     * @param null|integer $returnSubCode
     * @return $this
     */
    public function setReturnSubCode($returnSubCode)
    {
        $this->returnSubCode = $returnSubCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    /**
     * @param null|string $returnMessage
     * @return $this
     */
    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClientTRID()
    {
        return $this->clientTRID;
    }

    /**
     * @param null|string $clientTRID
     * @return $this
     */
    public function setClientTRID($clientTRID)
    {
        $this->clientTRID = $clientTRID;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getServerTRID()
    {
        return $this->serverTRID;
    }

    /**
     * @param null|string $serverTRID
     * @return $this
     */
    public function setServerTRID($serverTRID)
    {
        $this->serverTRID = $serverTRID;

        return $this;
    }
}