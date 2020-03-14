<?php

namespace MNocon\GnuTerryPratchett\Tests\Context;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\WebAssert;
use Behat\MinkExtension\Context\MinkContext;

class HeaderContext extends MinkContext
{
    /**
     * @Then I can see a server header
     */
    public function iCanSeeAServerHeader(TableNode $table): void
    {
        $headerName = $table->getHash()[0]['name'];
        $headerValue = $table->getHash()[0]['value'];

        $this->assertSession()->responseHeaderEquals($headerName, $headerValue);
    }
}