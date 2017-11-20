<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


trait BasicTrait
{

    /**
     * @var string
     */
    private $handle;

    /**
     * @var InfoResponseExtension|null
     */
    private $extension;

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
     * @return InfoResponseExtension|null
     */
    public function getExtension(): ?InfoResponseExtension
    {
        return $this->extension;
    }

    /**
     * @param InfoResponseExtension|null $extension
     * @return $this
     */
    public function setExtension(?InfoResponseExtension $extension)
    {
        $this->extension = $extension;
        return $this;
    }
}