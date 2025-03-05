# SmsMessageRecipients

The recipient number or multiple recipients numbers of single message. To set one recipient, simply pass here a `string` with his phone number. To set multiple recipients, pass here a simple `array` of `string`. Optionally you can also set custom id (user identifier) for each message - pass `PhoneNumberWithCid` object (in case of single recipient) or `Array` of `PhoneNumberWithCid` (in case of multiple recipients).


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

### `Components\PhoneNumberWithCid`

```php
/**
* @var Components\PhoneNumberWithCid
*/
Components\PhoneNumberWithCid $value = /* values here */
```

### `array`

```php
/**
* @var array<Components\PhoneNumberWithCid>
*/
array $value = /* values here */
```

