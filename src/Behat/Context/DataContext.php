<?php

namespace CpChart\Behat\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use CpChart\Behat\Fixtures\FixtureGenerator;

class DataContext implements Context, SnippetAcceptingContext
{
    /**
     * @var FixtureGenerator
     */
    private $fixturesGenerator;

    public function __construct()
    {
        $this->fixturesGenerator = new FixtureGenerator();
    }
    
    /**
     * @Transform :chart
     * @Transform /^(spline)$/
     */
    public function castChartNameToObject($name)
    {
        $image = $this->fixturesGenerator->createEmptyImage();
        
        switch ($name) {
            case 'spline':
                $this->fixturesGenerator->setSplineData($image);
                break;
        }
        
        return $image;
    }
}
