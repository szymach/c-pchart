<?php

namespace CpChart\Behat\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

/**
 * @author Piotr Szymaszek
 */
class BrowserContext implements Context
{
    /**
     * @Then there should be a :headerName header with value :headerValue set in the response
     */
    public function thereShouldBeAHeaderSetInTheResponse($headerName, $headerValue)
    {
        throw new PendingException();
    }
}
