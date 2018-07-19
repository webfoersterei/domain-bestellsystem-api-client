<?php
/**
 * @author Timo Förster <tfoerster@webfoersterei.de>
 * @date 23.11.17
 */

namespace Webfoersterei\DomainBestellSystemApiClient\Client;


use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordCreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordCreateResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordDeleteRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ResourceRecordDeleteResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneDeleteResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneInfoResponse;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneCreateRequest;
use Webfoersterei\DomainBestellSystemApiClient\Client\NameServer\ZoneCreateResponse;

class NameServerClient extends AbstractClient
{
    /**
     * @param ResourceRecordCreateRequest $resourceRecordCreateRequest
     * @return ResourceRecordCreateResponse
     */
    public function rrCreate(ResourceRecordCreateRequest $resourceRecordCreateRequest): ResourceRecordCreateResponse
    {
        $arrayRequest = $this->convertRequestToArray($resourceRecordCreateRequest);

        /** @var ResourceRecordCreateResponse $createResponse */
        $createResponse = $this->doApiCall('nameserverRRCreate', ResourceRecordCreateResponse::class, $arrayRequest);

        return $createResponse;
    }

    /**
     * @param ResourceRecordDeleteRequest $resourceRecordDeleteRequest
     * @return ResourceRecordDeleteResponse
     */
    public function rrDelete(ResourceRecordDeleteRequest $resourceRecordDeleteRequest): ResourceRecordDeleteResponse
    {
        $arrayRequest = $this->convertRequestToArray($resourceRecordDeleteRequest);

        /** @var ResourceRecordDeleteResponse $deleteResponse */
        $deleteResponse = $this->doApiCall('nameserverRRDelete', ResourceRecordDeleteResponse::class, $arrayRequest);

        return $deleteResponse;
    }

    /**
     * @param ZoneCreateRequest $zoneCreateRequest
     * @return ZoneCreateResponse
     */
    public function zoneCreate(ZoneCreateRequest $zoneCreateRequest): ZoneCreateResponse
    {
        $arrayRequest = $this->convertRequestToArray($zoneCreateRequest);

        /** @var ZoneCreateResponse $createResponse */
        $createResponse = $this->doApiCall('nameserverZoneCreate', ZoneCreateResponse::class, $arrayRequest);

        return $createResponse;
    }

    /**
     * @param string $domain
     * @return ZoneInfoResponse
     */
    public function zoneInfo(string $domain): ZoneInfoResponse
    {
        /** @var ZoneInfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('nameserverZoneInfo', ZoneInfoResponse::class, ['soaOrigin' => $domain]);

        return $infoResponse;
    }

    /**
     * @param string $domain
     * @return ZoneDeleteResponse
     */
    public function zoneDelete(string $domain): ZoneDeleteResponse
    {
        /** @var ZoneDeleteResponse $deleteResponse */
        $deleteResponse = $this->doApiCall('nameserverZoneDelete', ZoneDeleteResponse::class, ['soaOrigin' => $domain]);

        return $deleteResponse;
    }

}