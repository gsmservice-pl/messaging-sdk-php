<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** SmsMessage - An object with a new SMS message properties */
class SmsMessage
{
    /**
     * The recipient number or multiple recipients numbers of single message. To set one recipient, simply pass here a `string` with his phone number. To set multiple recipients, pass here a simple `array` of `string`. Optionally you can also set custom id (user identifier) for each message - pass `PhoneNumberWithCid` object (in case of single recipient) or `Array` of `PhoneNumberWithCid` (in case of multiple recipients).
     *
     * @var string|array<string>|PhoneNumberWithCid|array<PhoneNumberWithCid> $recipients
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('recipients')]
    #[\Speakeasy\Serializer\Annotation\Type('string|array<string>|\Gsmservice\Gateway\Models\Components\PhoneNumberWithCid|array<\Gsmservice\Gateway\Models\Components\PhoneNumberWithCid>')]
    public string|array|PhoneNumberWithCid $recipients;

    /**
     * SMS message content
     *
     * @var string $message
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('message')]
    public string $message;

    /**
     * SMS sender name
     *
     * @var ?string $sender
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('sender')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $sender = null;

    /**
     * SMS type (SmsType::SmsPro -> SMS PRO, SmsType::SmsEco -> SMS ECO, SmsType::SmsTwoWay ->SMS 2WAY)
     *
     * @var ?SmsType $type
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('type')]
    #[\Speakeasy\Serializer\Annotation\Type('\Gsmservice\Gateway\Models\Components\SmsType|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?SmsType $type = null;

    /**
     * Should the message be sent with special characters, e.g. Polish diacritics (if any)? If *false*, those characters will be automatically replaced with their equivalents. If *true* your message will be sent as **unicode** but the message will be able to consist of fewer characters.
     *
     * @var ?bool $unicode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('unicode')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $unicode = null;

    /**
     * Should the message to be sent with class 0 (FLASH)?
     *
     * @var ?bool $flash
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('flash')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $flash = null;

    /**
     * Scheduled future date and time of sending the message (in ISO 8601 format). If missing or null - message will be sent immediately
     *
     * @var ?\DateTime $date
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $date = null;

    /**
     * @param  string|array<string>|PhoneNumberWithCid|array<PhoneNumberWithCid>  $recipients
     * @param  string  $message
     * @param  ?string  $sender
     * @param  ?SmsType  $type
     * @param  ?bool  $unicode
     * @param  ?bool  $flash
     * @param  ?\DateTime  $date
     * @phpstan-pure
     */
    public function __construct(string|array|PhoneNumberWithCid $recipients, string $message, ?string $sender = 'Bramka SMS', ?SmsType $type = SmsType::SmsPro, ?bool $unicode = false, ?bool $flash = false, ?\DateTime $date = null)
    {
        $this->recipients = $recipients;
        $this->message = $message;
        $this->sender = $sender;
        $this->type = $type;
        $this->unicode = $unicode;
        $this->flash = $flash;
        $this->date = $date;
    }
}