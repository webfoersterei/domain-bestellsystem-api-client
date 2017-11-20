<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 20.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


trait ExtensionTrait
{
    /**
     * @var InfoResponseExtension|null
     */
    private $extension;

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