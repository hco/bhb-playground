<?php

namespace App\Service;

use App\Domain\CurrentCustomer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class CurrentCustomerParamConverter implements ParamConverterInterface
{

    public function apply(Request $request, ParamConverter $configuration)
    {
        $currentCustomer = new CurrentCustomer();
        $currentCustomer->name = "Ecki";

        $request->attributes->set($configuration->getName(), $currentCustomer);

    }

    public function supports(ParamConverter $configuration)
    {
        return $configuration->getClass() === CurrentCustomer::class;
    }
}
