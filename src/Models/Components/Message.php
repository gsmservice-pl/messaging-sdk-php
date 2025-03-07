<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** Message - An object defining the properties of a single message */
class Message
{
    /**
     * Message type (SmsType::SmsPro -> SMS PRO, SmsType::SmsEco -> SMS ECO, SmsType::SmsTwoWay ->SMS 2WAY, SmsType::Mms -> MMS)
     *
     * @var ?MessageType $type
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('type')]
    #[\Speakeasy\Serializer\Annotation\Type('\Gsmservice\Gateway\Models\Components\MessageType|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?MessageType $type = null;

    /**
     * A telephone number in international format (with a plus sign and the country code at the beginning, e.g. +48 for Poland)
     *
     * @var ?string $recipient
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('recipient')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $recipient = null;

    /**
     * Message status code
     *
     * @var ?string $statusCode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status_code')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $statusCode = null;

    /**
     * Human redable description of message status
     *
     * @var ?string $statusDescription
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status_description')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $statusDescription = null;

    /**
     * Did the message contain special characters, e.g. Polish diacritics?
     *
     * @var ?bool $unicode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('unicode')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $unicode = null;

    /**
     * Was the message sent with class 0 (FLASH)?
     *
     * @var ?bool $flash
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('flash')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $flash = null;

    /**
     * The price of message (in PLN)
     *
     * @var ?float $price
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('price')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?float $price = null;

    /**
     * Unique message identifier
     *
     * @var ?int $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $id = null;

    /**
     * Custom message ID assigned by the User
     *
     * @var ?string $cid
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('cid')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $cid = null;

    /**
     * Message sender name
     *
     * @var ?string $sender
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('sender')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $sender = null;

    /**
     * The count of parts that message consists of
     *
     * @var ?int $parts
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('parts')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $parts = null;

    /**
     * Sending date and time (in ISO 8601 format)
     *
     * @var ?\DateTime $sentDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('sent_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $sentDate = null;

    /**
     * Date and time of last status change (in ISO 8601 format)
     *
     * @var ?\DateTime $statusDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $statusDate = null;

    /**
     * @param  ?MessageType  $type
     * @param  ?string  $recipient
     * @param  ?string  $statusCode
     * @param  ?string  $statusDescription
     * @param  ?bool  $unicode
     * @param  ?bool  $flash
     * @param  ?float  $price
     * @param  ?int  $id
     * @param  ?string  $cid
     * @param  ?string  $sender
     * @param  ?int  $parts
     * @param  ?\DateTime  $sentDate
     * @param  ?\DateTime  $statusDate
     * @phpstan-pure
     */
    public function __construct(?MessageType $type = null, ?string $recipient = null, ?string $statusCode = null, ?string $statusDescription = null, ?bool $unicode = null, ?bool $flash = null, ?float $price = null, ?int $id = null, ?string $cid = null, ?string $sender = null, ?int $parts = null, ?\DateTime $sentDate = null, ?\DateTime $statusDate = null)
    {
        $this->type = $type;
        $this->recipient = $recipient;
        $this->statusCode = $statusCode;
        $this->statusDescription = $statusDescription;
        $this->unicode = $unicode;
        $this->flash = $flash;
        $this->price = $price;
        $this->id = $id;
        $this->cid = $cid;
        $this->sender = $sender;
        $this->parts = $parts;
        $this->sentDate = $sentDate;
        $this->statusDate = $statusDate;
    }
}