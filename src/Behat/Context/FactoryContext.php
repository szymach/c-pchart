<?php

namespace CpChart\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use CpChart\Services\CpChartFactory;

class FactoryContext implements Context, SnippetAcceptingContext
{
    /**
     * @var CpChartFactory
     */
    private $factory;

    /** @BeforeScenario */
    public function setupFactory(BeforeScenarioScope $scope)
    {
        $this->factory = new CpChartFactory();
    }
}
