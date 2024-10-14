<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway;

class SDKConfiguration
{
    public ?\GuzzleHttp\ClientInterface $defaultClient = null;

    public ?\GuzzleHttp\ClientInterface $securityClient = null;

    public ?Models\Components\Security $security = null;

    /** @var pure-Closure(): string */
    public ?\Closure $securitySource = null;

    public string $serverUrl = '';

    public string $server = '';

    public string $language = 'php';

    public string $openapiDocVersion = '0.9.2';

    public string $sdkVersion = '0.39.3';

    public string $genVersion = '2.438.3';

    public string $userAgent = 'speakeasy-sdk/php 0.39.3 2.438.3 0.9.2 gsmservice-pl/messaging-sdk-php';

    public function getServerUrl(): string
    {

        if ($this->serverUrl !== '') {
            return $this->serverUrl;
        }

        if ($this->server === '') {
            $this->server = Client::SERVER_PROD;
        }

        return Client::SERVERS[$this->server];
    }
    public function hasSecurity(): bool
    {
        return $this->security !== null || $this->securitySource !== null;
    }

    public function getSecurity(): ?Models\Components\Security
    {
        if ($this->securitySource !== null) {
            $security = new Models\Components\Security(
                bearer: $this->securitySource->call($this)
            );

            return $security;
        } else {
            return $this->security;
        }
    }
}