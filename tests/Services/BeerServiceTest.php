<?php

namespace App\Tests\Services;

use App\Entity\Beer;
use App\Services\BeerService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BeerServiceTest extends TestCase
{

    public function testGetBasicBeerWithParamsFoodMaltReturnBeerObject(){
        // setup
        $beerService = new BeerService();
        $food = 'malt';

        // Act
        $beer = $beerService->getBasicBeer($food);

        // Assert
        $this->assertNotNull($beer->getId());
        $this->assertNotNull($beer->getDescription());
        $this->assertNotNull($beer->getName());
    }

    public function testGetBasicBeerWithParamsEmptyReturnDomainException(){
        // setup
        $beerService = new BeerService();
        $food = '';
        // Assert
        $this->expectException(BadRequestHttpException::class);

        // Act
        $beer = $beerService->getBasicBeer($food);
    }

    public function testGetCompleteBeerWithParamsFoodMaltReturnBeerObject(){
        // setup
        $beerService = new BeerService();
        $food = 'malt';

        // Act
        $beer = $beerService->getCompleteBeer($food);

        // Assert
        $this->assertNotNull($beer->getId());
        $this->assertNotNull($beer->getDescription());
        $this->assertNotNull($beer->getName());
        $this->assertNotNull($beer->getImage());
        $this->assertNotNull($beer->getFirstBrewed());
        $this->assertNotNull($beer->getTagLine());
    }

    public function testGetCompleteBeerWithParamsEmptyReturnDomainException(){
        // setup
        $beerService = new BeerService();
        $food = '';
        // Assert
        $this->expectException(BadRequestHttpException::class);

        // Act
        $beer = $beerService->getCompleteBeer($food);
    }


}
