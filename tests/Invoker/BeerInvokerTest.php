<?php

namespace App\Tests\Invoker;

use App\Invoker\BeerInvoker;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BeerInvokerTest extends TestCase
{
    public function testGetBeerWithParamsFoodEmptyReturnGuzzleException(){
        // setup
        $beerService = new BeerInvoker();
        $food = '';

        // Assert
        $this->expectException(GuzzleException::class);

        // Act
        $beer = $beerService->getBeer($food);
    }

    public function testGetBeerWithParamsFoodMaltReturnResponse(){
        // setup
        $beerService = new BeerInvoker();
        $food = 'malt';

        // Act
        $rs = $beerService->getBeer($food);

        // Assert
        $this->assertNotEmpty($rs);
    }
}
