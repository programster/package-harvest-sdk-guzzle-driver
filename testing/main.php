<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$guzzleDriver = new \Programster\HarvestGuzzleDriver\Driver();

print "Please enter your harvest account id:" . PHP_EOL;
$accountId = readline();

print "Please enter your harvest token:" . PHP_EOL;
$token = readline();

$harvestClient = new \Programster\Harvest\HarvestClient($accountId, $token, $guzzleDriver);
$response = $harvestClient->getTimeEntries();

if ($response->getStatusCode() === 200)
{
    $responseObject = json_decode($response->getBody());
    print "Response: " . print_r($responseObject, true) . PHP_EOL;
}
else
{
    print "Whoops, something went wrong! Your authentication details are proably incorrect.";
}

