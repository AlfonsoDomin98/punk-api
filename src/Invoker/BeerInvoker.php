<?php

namespace App\Invoker;

use GuzzleHttp\Client;

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
    public function getBeer(string $id): string
    {
        $remoteApiUrl = $this->url.$this->remotePath;

        $response = $this->client->get($remoteApiUrl.'?food='.$id);

        if($response->getStatusCode() !== 200 ){
            throw new \DomainException();
        }

        return $response->getBody()->getContents();

    }
}
