<?php

namespace App\Service;

use App\Repository\AssetRepository;

class AssetService
{
    public function __construct(private AssetRepository $assetRepository)
    {
    }

    public function findAllAssets()
    {
        return $this->assetRepository->findAll();
    }
}
