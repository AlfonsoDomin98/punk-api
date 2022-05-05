<?php

namespace App\Reader;

use App\Entity\Beer;

class BeerReader
{
    public function readerBasicBeer(string $response): Beer
    {
        $arrayResponse = json_decode($response, true);

        return $this->createBeerByResponse($arrayResponse);
    }

    public function readerCompleteBeer(string $response): Beer
    {
        $arrayResponse = json_decode($response, true);
        $beer = $this->createBeerByResponse($arrayResponse);

        $beer->setFirstBrewed($arrayResponse[0]['first_brewed']);
        $beer->setTagLine($arrayResponse[0]['tagline']);
        $img = $arrayResponse[0]['image_url'];

        if(empty($img)){
            $img = 'Image not found';
        }

        $beer->setImage($img);

        return $beer;
    }

    private function createBeerByResponse(array $arrayResponse) :Beer
    {
        $id = (int)$arrayResponse[0]['id'];
        $name = $arrayResponse[0]['name'];
        $description = $arrayResponse[0]['description'];

        return new Beer($id, $name, $description);
    }
}
