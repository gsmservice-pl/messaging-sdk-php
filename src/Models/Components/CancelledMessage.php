<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** CancelledMessage - An  object containing information about results of cancelling single message */
class CancelledMessage
{
    /**
     * Message ID
     *
     * @var ?int $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $id = null;

    /**
     * Status of cancellation (204 if cancelled successfully or error status code)
     *
     * @var ?int $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $status = null;

    /**
     * An object that complies with RFC 9457 containing information about a request error
     *
     * @var ?ErrorResponse $error
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('error')]
    #[\Speakeasy\Serializer\Annotation\Type('\Gsmservice\Gateway\Models\Components\ErrorResponse|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?ErrorResponse $error = null;

    /**
     * @param  ?int  $id
     * @param  ?int  $status
     * @param  ?ErrorResponse  $error
     * @phpstan-pure
     */
    public function __construct(?int $id = null, ?int $status = null, ?ErrorResponse $error = null)
    {
        $this->id = $id;
        $this->status = $status;
        $this->error = $error;
    }
}