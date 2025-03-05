<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Gsmservice\Gateway\Models\Components;


/** SenderInput - An object with the properties of the message sender */
class SenderInput
{
    /**
     * Message sender name
     *
     * @var string $sender
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('sender')]
    public string $sender;

    /**
     * Description of the purpose of the sender name (required when adding new sender name)
     *
     * @var string $description
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('description')]
    public string $description;

    /**
     * @param  string  $sender
     * @param  string  $description
     * @phpstan-pure
     */
    public function __construct(string $sender, string $description)
    {
        $this->sender = $sender;
        $this->description = $description;
    }
}