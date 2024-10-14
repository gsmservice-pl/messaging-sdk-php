# SendSmsRequestBody

To send a single SMS or messages with the same content to multiple recipients, pass as the method param a single `Sms` object with the properties of this message. To send multiple messages with different content at the same time, pass as the method param an `array` of `Sms` objects with the properties of each message.


## Supported Types

### `Components\SmsMessage`

```php
Components\SmsMessage $value = /* values here */
```

### `array`

```php
array $value = /* values here */
```

