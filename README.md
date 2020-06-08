# Laravel Token Generator
#### Generate tokens based on your desire driver and algorithms

#### Installation
`$ composer require mehradsadeghi/laravel-token-generator`

#### Publishing config file
You need to publish the config file in order to be able to change token generator's driver.

`$ php artisan vendor:publish`

#### Drivers
There are 3 drivers available: 
 - Basic
 - Crypto
 - Hash
 
 *You can set the default driver in `config/token-generator.php` config file.*
 
 ##### Basic
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
         
 ##### Crypto
 It generates cryptographically secure pseudo-random token.
 
 ##### Hash
 It generates a hashed token based on given algorithm. You can specify the algorithm in `options` index of `hash` driver array.
 ```
 'hash' => [
    'driver' => \Mehradsadeghi\TokenGenerator\Drivers\Hash::class,
    'options' => [
        'alg' => 'sha256'
    ]
]
 ```
Example:
 ```
 \Mehradsadeghi\TokenGenerator\TokenGeneratorFacade::generate('your input');
 ```

