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
     * Unique message identifier
     *
     * @var ?int $id
     */
    #[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?int $id = null;

    /**
     * Custom message ID assigned by the User
     *
     * @var ?string $cid
     */
    #[\JMS\Serializer\Annotation\SerializedName('cid')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $cid = null;

    /**
     * Message type (SmsType::SmsPro -> SMS PRO, SmsType::SmsEco -> SMS ECO, SmsType::SmsTwoWay ->SMS 2WAY, SmsType::Mms -> MMS)
     *
     * @var ?MessageType $type
     */
    #[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('\Gsmservice\Gateway\Models\Components\MessageType|null')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?MessageType $type = null;

    /**
     * A telephone number in international format (with a plus sign and the country code at the beginning, e.g. +48 for Poland)
     *
     * @var ?string $recipient
     */
    #[\JMS\Serializer\Annotation\SerializedName('recipient')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $recipient = null;

    /**
     * Message sender name
     *
     * @var ?string $sender
     */
    #[\JMS\Serializer\Annotation\SerializedName('sender')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $sender = null;

    /**
     * The count of parts that message consists of
     *
     * @var ?int $parts
     */
    #[\JMS\Serializer\Annotation\SerializedName('parts')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?int $parts = null;

    /**
     * Sending date and time (in ISO 8601 format)
     *
     * @var ?\DateTime $sentDate
     */
    #[\JMS\Serializer\Annotation\SerializedName('sent_date')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $sentDate = null;

    /**
     * Date and time of last status change (in ISO 8601 format)
     *
     * @var ?\DateTime $statusDate
     */
    #[\JMS\Serializer\Annotation\SerializedName('status_date')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $statusDate = null;

    /**
     * Message status code
     *
     * @var ?string $statusCode
     */
    #[\JMS\Serializer\Annotation\SerializedName('status_code')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $statusCode = null;

    /**
     * Human redable description of message status
     *
     * @var ?string $statusDescription
     */
    #[\JMS\Serializer\Annotation\SerializedName('status_description')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $statusDescription = null;

    /**
     * Did the message contain special characters, e.g. Polish diacritics?
     *
     * @var ?bool $unicode
     */
    #[\JMS\Serializer\Annotation\SerializedName('unicode')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?bool $unicode = null;

    /**
     * Was the message sent with class 0 (FLASH)?
     *
     * @var ?bool $flash
     */
    #[\JMS\Serializer\Annotation\SerializedName('flash')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?bool $flash = null;

    /**
     * The price of message (in PLN)
     *
     * @var ?float $price
     */
    #[\JMS\Serializer\Annotation\SerializedName('price')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?float $price = null;

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