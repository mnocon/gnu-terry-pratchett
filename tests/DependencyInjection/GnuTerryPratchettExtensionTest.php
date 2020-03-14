<?php


namespace MNocon\GnuTerryPratchett\Tests\DependencyInjection;


use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use MNocon\GnuTerryPratchettBundle\DependencyInjection\GnuTerryPratchettExtension;
use MNocon\GnuTerryPratchettBundle\Event\Subscriber\XClacksOverheadHeaderSubscriber;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class GnuTerryPratchettExtensionTest extends AbstractExtensionTestCase
{

    /**
     * Return an array of container extensions you need to be registered for each test (usually just the container
     * extension you are testing.
     *
     * @return ExtensionInterface[]
     */
    protected function getContainerExtensions(): array
    {
        return [
            new GnuTerryPratchettExtension(),
        ];
    }

    public function test_after_loading_subsriber_exists()
    {
        $this->load();

        $this->assertContainerBuilderHasServiceDefinitionWithTag(XClacksOverheadHeaderSubscriber::class, 'kernel.event_subscriber');
    }
}