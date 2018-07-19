<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CreateResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\DeleteResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\ListResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\TradeRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\TradeResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\TransferRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\TransferResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\UpdateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\UpdateResponse;

class DomainClient extends AbstractClient
{

    /**
     * @param string $domainName
     * @return CheckResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function check(string $domainName): CheckResponse
    {
        /** @var CheckResponse $checkResponse */
        $checkResponse = $this->doApiCall('domainCheck', CheckResponse::class, ['domainName' => $domainName]);

        return $checkResponse;
    }

    /**
     * @param CreateRequest $createRequest
     * @return CreateResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function create(CreateRequest $createRequest): CreateResponse
    {
        $requestArray = $this->convertRequestToArray($createRequest);

        /** @var CreateResponse $createResponse */
        $createResponse = $this->doApiCall('domainCreate', CreateResponse::class, $requestArray);

        return $createResponse;
    }

    /**
     * @param string $domainName
     * @return DeleteResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function delete(string $domainName): DeleteResponse
    {
        /** @var DeleteResponse $deleteResponse */
        $deleteResponse = $this->doApiCall('domainDelete', DeleteResponse::class, ['domainName' => $domainName]);

        return $deleteResponse;
    }

    /**
     * @param string $domainName
     * @param bool $requestLockStatus
     * @return InfoResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function info(string $domainName, bool $requestLockStatus = false): InfoResponse
    {
        $parameters = ['domainName' => $domainName, 'requestLockStatus' => $requestLockStatus];

        /** @var InfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('domainInfo', InfoResponse::class, $parameters, ['datetime_format' => 'U']);

        return $infoResponse;
    }

    /**
     * @param string $level
     * @param int|null $limit
     * @param int|null $offset
     * @return ListResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function list($level = 'all', $limit = null, $offset = null): ListResponse
    {
        $parameters = ['level' => $level, 'limit' => $limit, 'offset' => $offset];

        return $this->doApiCall('domainList', ListResponse::class, $parameters);
    }

    /**
     * @param TradeRequest $tradeRequest
     * @return TradeResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function trade(TradeRequest $tradeRequest): TradeResponse
    {
        $requestArray = $this->convertRequestToArray($tradeRequest);

        /** @var TradeResponse $tradeResponse */
        $tradeResponse = $this->doApiCall('domainTrade', TradeResponse::class, $requestArray);

        return $tradeResponse;
    }

    /**
     * @param TransferRequest $transferRequest
     * @return TransferResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function transfer(TransferRequest $transferRequest): TransferResponse
    {
        $requestArray = $this->convertRequestToArray($transferRequest);

        /** @var TransferResponse $transferResponse */
        $transferResponse = $this->doApiCall('domainTransfer', TransferResponse::class, $requestArray);

        return $transferResponse;
    }

    /**
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function update(UpdateRequest $updateRequest): UpdateResponse
    {
        $requestArray = $this->convertRequestToArray($updateRequest);

        /** @var UpdateResponse $updateResponse */
        $updateResponse = $this->doApiCall('domainUpdate', UpdateResponse::class, $requestArray);

        return $updateResponse;
    }

}