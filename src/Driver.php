<?php

/*
 * A driver to use guzzle.
 */

namespace Programster\HarvestGuzzleDriver;


class Driver implements \Programster\Harvest\InterfaceMessengerDriver
{
    private \GuzzleHttp\Client $m_guzzle;


    public function __construct()
    {
        $this->m_guzzle = new \GuzzleHttp\Client();
    }


    public function newRequest(): \Psr\Http\Message\RequestInterface
    {
        $method = "GET"; // this will get overwritten, ignore.
        $uri = "http://funkychickens.com/"; // this will get overwritten, ignore.
        $request = new \GuzzleHttp\Psr7\Request($method, $uri);
        return $request;
    }


    public function send(\Psr\Http\Message\RequestInterface $request) : \Psr\Http\Message\ResponseInterface
    {
        $response = $this->m_guzzle->send($request);
        return $response;
    }


    public function convertStringToUri(string $uri): \Psr\Http\Message\UriInterface
    {
        return new \GuzzleHttp\Psr7\Uri($uri);
    }
}

