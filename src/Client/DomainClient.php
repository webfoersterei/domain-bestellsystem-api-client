<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 21.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\Domain\CheckResponse;

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

}