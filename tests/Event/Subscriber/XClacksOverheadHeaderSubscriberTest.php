<?php


namespace MNocon\GnuTerryPratchett\Tests\Event\Subscriber;


use DG\BypassFinals;
use MNocon\GnuTerryPratchettBundle\Event\Subscriber\XClacksOverheadHeaderSubscriber;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class XClacksOverheadHeaderSubscriberTest extends TestCase
{
    /** @var \MNocon\GnuTerryPratchettBundle\Event\Subscriber\XClacksOverheadHeaderSubscriber */
    private $subscriber;

    public function setUp(): void
    {
        BypassFinals::enable();
        $this->subscriber = new XClacksOverheadHeaderSubscriber();
    }

    public function testImplementsEventSubsscriberInterface()
    {
        $this->assertInstanceOf(EventSubscriberInterface::class, $this->subscriber);
    }

    public function testSubsribesToOnKernelResponse()
    {
        $subscribedEvents = XClacksOverheadHeaderSubscriber::getSubscribedEvents();

        $this->assertArrayHasKey(
        KernelEvents::RESPONSE,
            $subscribedEvents
        );
        $this->assertContains('addHeader', $subscribedEvents[KernelEvents::RESPONSE]);
    }

    public function testAddsXClacksOverheadHeader()
    {
        $responseHeaderBag = new ResponseHeaderBag();
        $responseMock = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $responseMock->headers = $responseHeaderBag;
        $responseEvent = $this->getMockBuilder(ResponseEvent::class)->disableOriginalConstructor()->getMock();
        $responseEvent->method('getResponse')->willReturn($responseMock);

        $this->subscriber->addHeader($responseEvent);
        $this->assertContains('GNU Terry Pratchett', $responseEvent->getResponse()->headers->all('X-Clacks-Overhead'));
    }
}