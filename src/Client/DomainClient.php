<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\InfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\UpdateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\UpdateResponse;

class DomainClient extends AbstractClient
{

    /**
     * @param string $domainName
     * @return CheckResponse
     */
    public function check(string $domainName): CheckResponse
    {
        /** @var CheckResponse $checkResponse */
        $checkResponse = $this->doApiCall('domainCheck', CheckResponse::class, ['domainName' => $domainName]);

        return $checkResponse;
    }

    /**
     * @param string $domainName
     * @param bool $requestLockStatus
     * @return InfoResponse
     */
    public function info(string $domainName, bool $requestLockStatus = false): InfoResponse
    {
        $parameters = ['domainName' => $domainName, 'requestLockStatus' => $requestLockStatus];

        /** @var InfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('domainInfo', InfoResponse::class, $parameters, ['datetime_format' => 'U']);

        return $infoResponse;
    }


    /**
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     */
    public function update(UpdateRequest $updateRequest): UpdateResponse
    {
        $requestArray = $this->convertRequestToArray($updateRequest);

        /** @var UpdateResponse $updateResponse */
        $updateResponse = $this->doApiCall('domainUpdate', UpdateResponse::class, $requestArray);

        return $updateResponse;
    }

}