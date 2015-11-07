<?php

namespace CpChart\Behat\Fixtures;

use CpChart\Classes\CpImage;
use CpChart\Services\CpChartFactory;

/**
 * @author Piotr Szymaszek
 */
class FixtureGenerator
{
    const FIXTURE_FOLDER = 'features/fixtures/output';
    
    /**
     * @var CpChartFactory
     */
    private $factory;
    
    public function __construct()
    {
        $this->factory = new CpChartFactory();
    }
    
    public static function setFixturesPath($basePath)
    {
        return sprintf(
            '%s/%s',
            $basePath,
            self::FIXTURE_FOLDER
        );
    }
    
    public function createEmptyImage($width = 700, $height = 400, $data = null)
    {
        return $this->factory->newImage($width, $height, $data);
    }
    
    public function setSplineData(CpImage $image)
    {
        $coordinates = array(array(40, 80), array(280, 60), array(340, 166), array(590, 120));
        $settings = array("R" => 255, "G" => 255, "B" => 255, "ShowControl" => true);
        $image->drawSpline($coordinates, $settings);
    }
}
