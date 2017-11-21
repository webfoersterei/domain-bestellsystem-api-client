<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\InfoResponse;

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

}