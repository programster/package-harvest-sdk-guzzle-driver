# Harvest SDK Guzzle Driver
A Guzzle-based driver for the harvest SDK.


## Installation

```bash
composer require programster/harvest-sdk-guzzle-driver
```

## Example Usage

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$guzzleDriver = new \Programster\HarvestGuzzleDriver\Driver();

$harvestClient = new \Programster\Harvest\HarvestClient(
    $harvestAccountId="xxx", 
    $harvestTokenId="xxx", 
    $guzzleDriver
);

$response = $harvestClient->getTimeEntries();

if ($response->getStatusCode() === 200)
{
    $responseObject = json_decode($response->getBody());
    print "Harvest Response: " . print_r($responseObject, true) . PHP_EOL;
}
else
{
    print "Something wen't wrong! Your authentication details are probably incorrect.";
}
```
