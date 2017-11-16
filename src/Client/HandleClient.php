<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\ListResponse;

class HandleClient extends AbstractClient
{

    /**
     * @return ListResponse
     */
    public function getList(): ListResponse
    {
        /** @var ListResponse $listResponse */
        $listResponse = $this->doApiCall('handleList', ListResponse::class);

        return $listResponse;
    }

}