<?php

namespace MNocon\GnuTerryPratchettBundle\Event\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class XClacksOverheadHeaderSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['addHeader'],
        ];
    }

    public function addHeader(ResponseEvent $event)
    {
        $event->getResponse()->headers->set('X-Clacks-Overhead', 'GNU Terry Pratchett');
    }
}
