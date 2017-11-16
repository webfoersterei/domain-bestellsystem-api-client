<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\ListResponse;

class HandleClient extends AbstractClient
{

    /**
     * @param string $handleId
     * @return InfoResponse
     */
    public function get(string $handleId): InfoResponse
    {
        /** @var InfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('handleInfo', InfoResponse::class, ['handle' => $handleId]);

        return $infoResponse;
    }

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