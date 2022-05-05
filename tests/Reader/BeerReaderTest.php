<?php

namespace App\Tests\Reader;

use App\Reader\BeerReader;
use PHPUnit\Framework\TestCase;

class BeerReaderTest extends TestCase
{
    public function testReaderBasicBeerWithAllParametersInResponseReturnBasicDataBeer(){
        // setup
        $beerReader= new BeerReader();
        $mockRsp = $this->getMockResponse();

        // Act
        $beer = $beerReader->readerBasicBeer($mockRsp);

        // Assert
        $this->assertEquals(309, $beer->getId());
        $this->assertEquals("Our longest running beer series, Paradox sees us ageing an Imperial Stout in different types of cask. This one showcases grain whisky.", $beer->getDescription());
        $this->assertEquals("Paradox Islay 2018", $beer->getName());
    }

    public function testReaderCompleteBeerWithAllParametersInResponseReturnBasicDataBeer(){
        // setup
        $beerReader= new BeerReader();
        $mockRsp = $this->getMockResponse();

        // Act
        $beer = $beerReader->readerCompleteBeer($mockRsp);

        // Assert
        $this->assertEquals(309, $beer->getId());
        $this->assertEquals("Our longest running beer series, Paradox sees us ageing an Imperial Stout in different types of cask. This one showcases grain whisky.", $beer->getDescription());
        $this->assertEquals("Paradox Islay 2018", $beer->getName());
        $this->assertEquals("Whisky Cask Aged Imperial Stout.", $beer->getTagLine());
        $this->assertEquals('Image not found', $beer->getImage());
        $this->assertEquals(2018, $beer->getFirstBrewed());
    }


    private function getMockResponse(){
        return '[
            {
                "id": 309,
                "name": "Paradox Islay 2018",
                "tagline": "Whisky Cask Aged Imperial Stout.",
                "first_brewed": "2018",
                "description": "Our longest running beer series, Paradox sees us ageing an Imperial Stout in different types of cask. This one showcases grain whisky.",
                "image_url": null,
                "abv": 13.5,
                "ibu": 100,
                "target_fg": 1015,
                "target_og": 1112,
                "ebc": 300,
                "srm": 152,
                "ph": 4.4,
                "attenuation_level": 84
            }
        ]';
    }
}
