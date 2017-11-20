<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 19.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client\Handle;


class UpdateRequest
{
    use BasicTrait;
    use NameTrait;
    use AddressTrait;
    use ContactTrait;
    use ExtensionTrait;
}