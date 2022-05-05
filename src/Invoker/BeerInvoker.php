<?php

namespace App\Invoker;

use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BeerInvoker
{
    private $url = 'https://api.punkapi.com/';
    private $remotePath = 'v2/beers';
    private $client;

    public function __construct()
    {
        $this->client = new Client();

    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBeer(string $food): string
    {
        $remoteApiUrl = $this->url.$this->remotePath;

        $response = $this->client->get($remoteApiUrl.'?food='.$food);

        return $response->getBody()->getContents();

    }
}
