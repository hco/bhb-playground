<?php

namespace App\Service;

use App\Entity\Asset;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelEvents;

class ViewEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => 'onKernelView',
        ];
    }

    public function onKernelView(ViewEvent $event)
    {
        $value = $event->getControllerResult();

        if(!$value instanceof Asset) {
            return;
        }

        $response = new JsonResponse($value);
        $event->setResponse($response);
    }
}
