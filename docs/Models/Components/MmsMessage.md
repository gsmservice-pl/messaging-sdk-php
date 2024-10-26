# MmsMessage

An object with a new MMS message properties


## Fields

| Field                                                                                                                                                                                                                                                                                                                                                                                                                              | Type                                                                                                                                                                                                                                                                                                                                                                                                                               | Required                                                                                                                                                                                                                                                                                                                                                                                                                           | Description                                                                                                                                                                                                                                                                                                                                                                                                                        | Example                                                                                                                                                                                                                                                                                                                                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `recipients`                                                                                                                                                                                                                                                                                                                                                                                                                       | [string\|array\|Components\PhoneNumberWithCid](../../Models/Components/Recipients.md)                                                                                                                                                                                                                                                                                                                                              | :heavy_check_mark:                                                                                                                                                                                                                                                                                                                                                                                                                 | The recipient number or multiple recipients numbers of single message. To set one recipient, simply pass here a `string` with his phone number. To set multiple recipients, pass here a simple `array` of `string`. Optionally you can also set custom id (user identifier) for each message - pass `PhoneNumberWithCid` object (in case of single recipient) or `Array` of `PhoneNumberWithCid` (in case of multiple recipients). |                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| `message`                                                                                                                                                                                                                                                                                                                                                                                                                          | *string*                                                                                                                                                                                                                                                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                                                                                                                                                                                                                                                 | MMS message content                                                                                                                                                                                                                                                                                                                                                                                                                | To jest treść wiadomości                                                                                                                                                                                                                                                                                                                                                                                                           |
| `attachments`                                                                                                                                                                                                                                                                                                                                                                                                                      | [string\|array\|null](../../Models/Components/Attachments.md)                                                                                                                                                                                                                                                                                                                                                                      | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                 | Attachments for the message. You can pass here images, audio and video files bodies. To set one attachment please pass a `string` with attachment body encoded by `base64_encode()` function. To set multiple attachments - pass an `array` of `strings` with attachment bodies encoded by `base64_encode()` function. Max 3 attachments per message.                                                                              |                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| `subject`                                                                                                                                                                                                                                                                                                                                                                                                                          | *?string*                                                                                                                                                                                                                                                                                                                                                                                                                          | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                 | MMS message subject                                                                                                                                                                                                                                                                                                                                                                                                                | To jest temat wiadomości                                                                                                                                                                                                                                                                                                                                                                                                           |
| `date`                                                                                                                                                                                                                                                                                                                                                                                                                             | [\DateTime](https://www.php.net/manual/en/class.datetime.php)                                                                                                                                                                                                                                                                                                                                                                      | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                 | Scheduled future date and time of sending the message (in ISO 8601 format). If missing or null - message will be sent immediately                                                                                                                                                                                                                                                                                                  | <nil>                                                                                                                                                                                                                                                                                                                                                                                                                              |