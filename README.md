# Laravel Token Generator
#### Generate tokens based on your desire driver and algorithms

### Installation
`$ composer require mehradsadeghi/laravel-token-generator`

### Publishing config file
It'll work with the default configurations, But you can publish the config file in order change defaults or add your custom driver.

`$ php artisan vendor:publish`

### Drivers
There are 3 drivers available: 
- Basic
- Crypto
- Unique

*You can set the default driver in `config/token-generator.php` config file or in your `.env` file by `TOKEN_GENERATOR_DEFAULT` key.*

#### Basic
It simply generates a random token.

Example:
```
\Mehradsadeghi\TokenGenerator\TokenGeneratorFacade::generate();
```
You can also change the default length of token in config file:
```
'basic' => [
    'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Basic::class,
    'options' => [
        'length' => 10
    ]
]
```
         
#### Crypto
It generates cryptographically secure pseudo-random token.
 
#### Unique
It generates a hashed (unique) token, based on given algorithm. You can specify the algorithm in `options` index of `unique` driver array.
```
'unique' => [
    'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Unique::class,
    'options' => [
        'alg' => 'sha256'
    ]
]
```
Example:
```
\Mehradsadeghi\TokenGenerator\TokenGeneratorFacade::generate('your input');
```

### Helper Function
`token()` helper function and `TokenGeneratorFacade` can be used interchangeably. For example:

```
token()->generate();
```

### Switching Driver Dynamically
You can switch generator driver dynamically at run-time:

```
token()->generate(); // default driver
token()->driver('crypto')->generate(); // crypto driver
```
also
```
TokenGeneratorFacade::driver('crypto')->generate();
```
### Extending Token Generator
You can set up your own custom driver easily. First you need to add your desired configuration into `token-generator` config file:
 