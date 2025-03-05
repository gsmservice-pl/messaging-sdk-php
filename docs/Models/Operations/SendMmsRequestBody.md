# SendMmsRequestBody

To send a single MMS or messages with the same content to multiple recipients, pass in the Request Body a single `MmsMessage` object with the properties of this message. To send multiple messages with different content at the same time, pass in the Request Body an `array` of `MmsMessage` objects with the properties of each message.


## Supported Types

### `Components\MmsMessage`

```php
/**
* @var Components\MmsMessage
*/
Components\MmsMessage $value = /* values here */
```

### `array`

```php
/**
* @var array<Components\MmsMessage>
*/
array $value = /* values here */
```

