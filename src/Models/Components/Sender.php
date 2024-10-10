<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** Sender - An object with the properties of the message sender */
class Sender
{
    /**
     * Message sender name
     *
     * @var string $sender
     */
    #[\JMS\Serializer\Annotation\SerializedName('sender')]
    public string $sender;

    /**
     * Sender name status
     *
     * @var string $status
     */
    #[\JMS\Serializer\Annotation\SerializedName('status')]
    public string $status;

    /**
     * Is the sender default?
     *
     * @var bool $isDefault
     */
    #[\JMS\Serializer\Annotation\SerializedName('is_default')]
    public bool $isDefault;

    /**
     * @param  string  $sender
     * @param  string  $status
     * @param  bool  $isDefault
     */
    public function __construct(string $sender, string $status, bool $isDefault)
    {
        $this->sender = $sender;
        $this->status = $status;
        $this->isDefault = $isDefault;
    }
}