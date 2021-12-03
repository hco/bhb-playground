<?php

namespace App\Controller;

use App\Domain\CurrentCustomer;
use App\Entity\Asset;
use App\Service\AssetService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    public function __construct(private AssetService $assetService)
    {
    }

    #[Route('/test123/{id}')]
    public function testAction($id)
    {
        return new Response("Hallo Welt! " . $id);
    }

    #[Route('/asset/{id}')]
    public function getAsset(#[ReadFromDatabaseByRouteParameter("id")] Asset $asset, CurrentCustomer $currentCustomer)
    {
        return new Response($asset->getName() . " " . $currentCustomer->name);
    }


    #[Route('/asset2/{id}')]
    public function getAsset2(Asset $asset, CurrentCustomer $currentCustomer)
    {
        return $asset;
    }


    #[Route('/allAssets')]
    public function findAllAssets()
    {
        $assets = $this->assetService->findAllAssets();
        return new Response(json_encode($assets));
    }
}

