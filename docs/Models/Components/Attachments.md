# Attachments

Attachments for the message. You can pass here images, audio and video files bodies. To set one attachment please pass a `string` with attachment body encoded by `base64_encode()` function. To set multiple attachments - pass an `array` of `strings` with attachment bodies encoded by `base64_encode()` function. Max 3 attachments per message.


## Supported Types

### `string`

```php
/**
* @var string
*/
string $value = /* values here */
```

### `array`

```php
/**
* @var array<string>
*/
array $value = /* values here */
```

