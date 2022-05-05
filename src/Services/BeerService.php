<?php

namespace App\Services;

use App\Entity\Beer;
use App\Invoker\BeerInvoker;
use App\Reader\BeerReader;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BeerService
{
    private $beerInvoker;
    private $beerReader;

    public function __construct()
    {
        $this->beerInvoker = new BeerInvoker();
        $this->beerReader = new BeerReader();
    }

    public function getBasicBeer(string $food): Beer
    {
        try {
            $response = $this->beerInvoker->getBeer($food);
            $beer = $this->beerReader->readerBasicBeer($response);

        } catch (\Exception $exception){
            throw new BadRequestHttpException();
        }

        return $beer;

    }

    public function getCompleteBeer(string $food): Beer
    {
        try {
            $response = $this->beerInvoker->getBeer($food);
            $beer = $this->beerReader->readerCompleteBeer($response);

        } catch (\Exception $exception){
            throw new BadRequestHttpException();
        }

        return $beer;
    }
}
