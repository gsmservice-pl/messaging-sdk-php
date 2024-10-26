<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** MmsMessage - An object with a new MMS message properties */
class MmsMessage
{
    /**
     * The recipient number or multiple recipients numbers of single message. To set one recipient, simply pass here a `string` with his phone number. To set multiple recipients, pass here a simple `array` of `string`. Optionally you can also set custom id (user identifier) for each message - pass `PhoneNumberWithCid` object (in case of single recipient) or `Array` of `PhoneNumberWithCid` (in case of multiple recipients).
     *
     * @var string|array<string>|PhoneNumberWithCid|array<PhoneNumberWithCid> $recipients
     */
    #[\JMS\Serializer\Annotation\SerializedName('recipients')]
    #[\JMS\Serializer\Annotation\Type('string|array<string>|\Gsmservice\Gateway\Models\Components\PhoneNumberWithCid|array<\Gsmservice\Gateway\Models\Components\PhoneNumberWithCid>')]
    public string|array|PhoneNumberWithCid $recipients;

    /**
     * MMS message subject
     *
     * @var ?string $subject
     */
    #[\JMS\Serializer\Annotation\SerializedName('subject')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?string $subject = null;

    /**
     * MMS message content
     *
     * @var ?string $message
     */
    #[\JMS\Serializer\Annotation\SerializedName('message')]
    public ?string $message;

    /**
     * Attachments for the message. You can pass here images, audio and video files bodies. To set one attachment please pass a `string` with attachment body encoded by `base64_encode()` function. To set multiple attachments - pass an `array` of `strings` with attachment bodies encoded by `base64_encode()` function. Max 3 attachments per message.
     *
     * @var string|array<string>|null $attachments
     */
    #[\JMS\Serializer\Annotation\SerializedName('attachments')]
    #[\JMS\Serializer\Annotation\Type('string|array<string>')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public string|array|null $attachments = null;

    /**
     * Scheduled future date and time of sending the message (in ISO 8601 format). If missing or null - message will be sent immediately
     *
     * @var ?\DateTime $date
     */
    #[\JMS\Serializer\Annotation\SerializedName('date')]
    #[\JMS\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $date = null;

    /**
     * @param  string|array<string>|PhoneNumberWithCid|array<PhoneNumberWithCid>  $recipients
     * @param  ?string  $message
     * @param  string|array<string>|null  $attachments
     * @param  ?string  $subject
     * @param  ?\DateTime  $date
     */
    public function __construct(string|array|PhoneNumberWithCid $recipients, ?string $message = null, string|array|null $attachments = null, ?string $subject = null, ?\DateTime $date = null)
    {
        $this->recipients = $recipients;
        $this->message = $message;
        $this->attachments = $attachments;
        $this->subject = $subject;
        $this->date = $date;
    }
}