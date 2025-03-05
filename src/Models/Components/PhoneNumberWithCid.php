<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** PhoneNumberWithCid - An object defining the message recipient telephone number with the message's custom identifier assigned by the User */
class PhoneNumberWithCid
{
    /**
     * A telephone number in international format (with a plus sign and the country code at the beginning, e.g. +48 for Poland)
     *
     * @var string $nr
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('nr')]
    public string $nr;

    /**
     * Custom message ID assigned by the User
     *
     * @var ?string $cid
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('cid')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $cid = null;

    /**
     * @param  string  $nr
     * @param  ?string  $cid
     * @phpstan-pure
     */
    public function __construct(string $nr, ?string $cid = null)
    {
        $this->nr = $nr;
        $this->cid = $cid;
    }
}