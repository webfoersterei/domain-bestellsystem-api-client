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
     * @param string $soaOrigin
     * @param ResourceRecordCreateRequest $resourceRecordCreateRequest
     * @return ResourceRecordCreateResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function rrCreate(
        string $soaOrigin,
        ResourceRecordCreateRequest $resourceRecordCreateRequest
    ): ResourceRecordCreateResponse {
        $arrayRequest = $this->convertRequestToArray($resourceRecordCreateRequest);

        /** @var ResourceRecordCreateResponse $createResponse */
        $createResponse = $this->doApiCall('nameserverRRCreate', ResourceRecordCreateResponse::class,
            array_merge(['soaOrigin' => $soaOrigin], $arrayRequest));

        return $createResponse;
    }

    /**
     * @param string $soaOrigin
     * @param ResourceRecordDeleteRequest $resourceRecordDeleteRequest
     * @return ResourceRecordDeleteResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function rrDelete(
        string $soaOrigin,
        ResourceRecordDeleteRequest $resourceRecordDeleteRequest
    ): ResourceRecordDeleteResponse {
        $arrayRequest = $this->convertRequestToArray($resourceRecordDeleteRequest);

        /** @var ResourceRecordDeleteResponse $deleteResponse */
        $deleteResponse = $this->doApiCall('nameserverRRDelete', ResourceRecordDeleteResponse::class,
            array_merge(['soaOrigin' => $soaOrigin], $arrayRequest));

        return $deleteResponse;
    }

    /**
     * @param string $soaOrigin
     * @param ZoneCreateRequest $zoneCreateRequest
     * @return ZoneCreateResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function zoneCreate(string $soaOrigin, ZoneCreateRequest $zoneCreateRequest): ZoneCreateResponse
    {
        $arrayRequest = $this->convertRequestToArray($zoneCreateRequest);

        /** @var ZoneCreateResponse $createResponse */
        $createResponse = $this->doApiCall('nameserverZoneCreate', ZoneCreateResponse::class,
            array_merge(['soaOrigin' => $soaOrigin], $arrayRequest));

        return $createResponse;
    }


    /**
     * @param string $soaOrigin
     * @return ZoneDeleteResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function zoneDelete(string $soaOrigin): ZoneDeleteResponse
    {
        /** @var ZoneDeleteResponse $deleteResponse */
        $deleteResponse = $this->doApiCall('nameserverZoneDelete', ZoneDeleteResponse::class,
            ['soaOrigin' => $soaOrigin]);

        return $deleteResponse;
    }


    /**
     * @param string $soaOrigin
     * @return ZoneInfoResponse
     * @throws \Webfoersterei\DomainBestellSystemApiClient\Exception\InvalidArgumentException
     */
    public function zoneInfo(string $soaOrigin): ZoneInfoResponse
    {
        /** @var ZoneInfoResponse $infoResponse */
        $infoResponse = $this->doApiCall('nameserverZoneInfo', ZoneInfoResponse::class, ['soaOrigin' => $soaOrigin]);

        return $infoResponse;
    }
}