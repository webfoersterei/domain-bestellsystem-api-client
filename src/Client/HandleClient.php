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
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
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
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
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
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function info(string $handleId): InfoResponse
    {
        /** @var InfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('handleInfo', InfoResponse::class, ['handle' => $handleId]);

        return $infoResponse;
    }

    /**
     * @return ListResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function list(): ListResponse
    {
        return $this->doApiCall('handleList', ListResponse::class);
    }

    /**
     * @param string $handleId
     * @param string $targetReseller
     * @return MoveResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function move(string $handleId, string $targetReseller): MoveResponse
    {
        $parameters = ['handle' => $handleId, 'moveTo' => $targetReseller];

        return $this->doApiCall('handleMove', MoveResponse::class, $parameters);
    }

    /**
     * @param string $handleId
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function update(string $handleId, UpdateRequest $updateRequest): UpdateResponse
    {
        $arrayRequest = $this->convertRequestToArray($updateRequest);

        /** @var UpdateResponse $updateResponse */
        $updateResponse = $this->doApiCall('handleUpdate', UpdateResponse::class,
            array_merge(['handle' => $handleId], $arrayRequest));

        return $updateResponse;
    }

}