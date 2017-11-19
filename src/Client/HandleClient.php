<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\ListResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\MoveResponse;

class HandleClient extends AbstractClient
{

    /**
     * @param string $handleId
     * @return CheckResponse
     */
    public function check(string $handleId): CheckResponse
    {
        /** @var CheckResponse $checkResponse */
        $checkResponse = $this->doApiCall('handleCheck', CheckResponse::class, ['handle' => $handleId]);

        return $checkResponse;
    }

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

    /**
     * @param string $handle
     * @param string $targetReseller
     * @return MoveResponse
     */
    public function move(string $handle, string $targetReseller): MoveResponse
    {
        $parameters = ['handle' => $handle, 'moveTo' => $targetReseller];

        /** @var MoveResponse $moveResponse */
        $moveResponse = $this->doApiCall('handleMove', MoveResponse::class, $parameters);

        return $moveResponse;
    }

}