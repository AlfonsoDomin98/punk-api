<?php

namespace App\Controller;



use App\Services\BeerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class BeerController extends AbstractController
{
    private $beerService;

    public function __construct()
    {
        $this->beerService = new BeerService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getBasicBeerAction(Request $request)
    {
        $food = $request->get('food');

        $food = $this->beerService->getBasicBeer($food);

        return $this->json($food);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCompleteBeerAction(Request $request)
    {
        $food = $request->get('food');

        $food = $this->beerService->getCompleteBeer($food);

        $food = $this->beerService->getBasicBeer($food);

        return $this->json($food);
    }
}
