<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway;

use Gsmservice\Gateway\Models\Operations;
use JMS\Serializer\DeserializationContext;

class Incoming
{
    private SDKConfiguration $sdkConfiguration;
    /**
     * @param  SDKConfiguration  $sdkConfig
     */
    public function __construct(SDKConfiguration $sdkConfig)
    {
        $this->sdkConfiguration = $sdkConfig;
    }

    /**
     * List the received SMS messages
     *
     * Get the details of all of received messages from your account incoming messages box. This endpoint supports pagination so you have to pass as query parameters a `page` value (number of page with received messages which you want to access) and a `limit` value (max of received messages per page). Messages are fetched from the latest one. The system will accept maximum **50** as `limit` parameter value. If you need to get details of larger volume of messages, please access them with next pages.
     *     
     * As a successful result an array with `IncomingMessage` objects will be returned, each object per single received message. Response will also include meta-data headers: `X-Total-Results` (a total count of all received messages which are available in incoming box on your account), `X-Total-Pages` (a total number of all pages with results), `X-Current-Page` (A current page number) and `X-Limit` (messages count per single page). This request have to be authenticated using **API Access Token**. 
     *
     * A response contains also a special `Link` header which includes *URIs* to access next, previous, first and last page with received messages (which complies with [RFC 5988](https://www.rfc-editor.org/rfc/rfc5988)).
     *
     * In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).
     *
     * @param  ?int  $page
     * @param  ?int  $limit
     * @return Operations\ListIncomingMessagesResponse
     * @throws \Gsmservice\Gateway\Models\Errors\SDKException
     */
    public function list(?int $page = null, ?int $limit = null): Operations\ListIncomingMessagesResponse
    {
        $request = new Operations\ListIncomingMessagesRequest(
            page: $page,
            limit: $limit,
        );
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/incoming');
        $options = ['http_errors' => false];
        $options = array_merge_recursive($options, Utils\Utils::getQueryParams(Operations\ListIncomingMessagesRequest::class, $request));
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;
        $httpRequest = new \GuzzleHttp\Psr7\Request('GET', $url);


        $httpResponse = $this->sdkConfiguration->securityClient->send($httpRequest, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();
        if ($statusCode == 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $obj = $serializer->deserialize((string) $httpResponse->getBody(), 'array<\Gsmservice\Gateway\Models\Components\IncomingMessage>', 'json', DeserializationContext::create()->setRequireAllRequiredProperties(true));
                $response = new Operations\ListIncomingMessagesResponse(
                    statusCode: $statusCode,
                    contentType: $contentType,
                    rawResponse: $httpResponse,
                    headers: $httpResponse->getHeaders(),
                    incomingMessages: $obj);

                return $response;
            } else {
                throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown content type received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
            }
        } elseif ($statusCode == 400 || $statusCode == 401 || $statusCode == 403 || $statusCode == 404 || $statusCode >= 400 && $statusCode < 500 || $statusCode >= 500 && $statusCode < 600) {
            if (Utils\Utils::matchContentType($contentType, 'application/problem+json')) {
                $serializer = Utils\JSON::createSerializer();
                $obj = $serializer->deserialize((string) $httpResponse->getBody(), '\Gsmservice\Gateway\Models\Errors\ErrorResponse', 'json', DeserializationContext::create()->setRequireAllRequiredProperties(true));
                throw $obj->toException();
            } else {
                throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown content type received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
            }
        } else {
            throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown status code received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
        }
    }

    /**
     * Get the incoming messages by IDs
     *
     * Get the details of one or more received messages using their `ids`. You have to pass the unique incoming message *IDs* as path parameter, which were given while receiving a messages. If you want to get the details of multiple messages at once, please separate their IDs with a comma. The system will accept maximum 50 identifiers in one call. If you need to get details of larger volume of incoming messages, please split it to several separate requests.
     *     
     * As a successful result an array with `IncomingMessage` objects will be returned, each object per single found message. Response will also include meta-data headers: `X-Success-Count` (a count of incoming messages which were found and returned correctly) and `X-Error-Count` (count of incoming messages which were not found).
     *
     * If you pass duplicated IDs, API will return data of this message only once. This request have to be authenticated using **API Access Token**. 
     *
     * In case of an error, the `ErrorResponse` object will be returned with proper HTTP header status code (our error response complies with [RFC 9457](https://www.rfc-editor.org/rfc/rfc7807)).
     *
     * @param  array<int>  $ids
     * @return Operations\GetIncomingMessagesResponse
     * @throws \Gsmservice\Gateway\Models\Errors\SDKException
     */
    public function getByIds(array $ids): Operations\GetIncomingMessagesResponse
    {
        $request = new Operations\GetIncomingMessagesRequest(
            ids: $ids,
        );
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/incoming/{ids}', Operations\GetIncomingMessagesRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;
        $httpRequest = new \GuzzleHttp\Psr7\Request('GET', $url);


        $httpResponse = $this->sdkConfiguration->securityClient->send($httpRequest, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();
        if ($statusCode == 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $obj = $serializer->deserialize((string) $httpResponse->getBody(), 'array<\Gsmservice\Gateway\Models\Components\IncomingMessage>', 'json', DeserializationContext::create()->setRequireAllRequiredProperties(true));
                $response = new Operations\GetIncomingMessagesResponse(
                    statusCode: $statusCode,
                    contentType: $contentType,
                    rawResponse: $httpResponse,
                    headers: $httpResponse->getHeaders(),
                    incomingMessages: $obj);

                return $response;
            } else {
                throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown content type received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
            }
        } elseif ($statusCode == 400 || $statusCode == 401 || $statusCode == 404 || $statusCode >= 400 && $statusCode < 500 || $statusCode >= 500 && $statusCode < 600) {
            if (Utils\Utils::matchContentType($contentType, 'application/problem+json')) {
                $serializer = Utils\JSON::createSerializer();
                $obj = $serializer->deserialize((string) $httpResponse->getBody(), '\Gsmservice\Gateway\Models\Errors\ErrorResponse', 'json', DeserializationContext::create()->setRequireAllRequiredProperties(true));
                throw $obj->toException();
            } else {
                throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown content type received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
            }
        } else {
            throw new \Gsmservice\Gateway\Models\Errors\SDKException('Unknown status code received', $statusCode, $httpResponse->getBody()->getContents(), $httpResponse);
        }
    }

}