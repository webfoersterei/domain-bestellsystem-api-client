<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 15.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\CreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\CreateResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\ListResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\MoveResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\UpdateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Handle\UpdateResponse;

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
     * @param CreateRequest $createRequest
     * @return CreateResponse
     */
    public function create(CreateRequest $createRequest): CreateResponse
    {
        $arrayRequest = $this->convertRequestToArray($createRequest);

        /** @var CreateResponse $createResponse */
        $createResponse = $this->doApiCall('handleCreate', CreateResponse::class, $arrayRequest);

        return $createResponse;
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

    /**
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     */
    public function update(UpdateRequest $updateRequest): UpdateResponse
    {
        $arrayRequest = $this->convertRequestToArray($updateRequest);

        /** @var UpdateResponse $updateResponse */
        $updateResponse = $this->doApiCall('handleUpdate', UpdateResponse::class, $arrayRequest);

        return $updateResponse;
    }

}