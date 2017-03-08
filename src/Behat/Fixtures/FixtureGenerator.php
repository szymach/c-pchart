<?php

namespace CpChart\Behat\Fixtures;

use CpChart\Chart\Data;
use CpChart\Chart\Image;
use CpChart\Factory\Factory;

/**
 * @author Piotr Szymaszek
 */
class FixtureGenerator
{
    const FIXTURE_FOLDER = 'features/fixtures/output';

    /**
     * @var Factory
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new Factory();
    }

    /**
     * @param string $basePath
     * @return string
     */
    public static function getFixturesPath($basePath)
    {
        return sprintf(
            '%s/%s',
            $basePath,
            self::FIXTURE_FOLDER
        );
    }

    /**
     * @param int $width
     * @param int $height
     * @param Data $data
     * @return Image
     */
    public function createEmptyImage($width = 700, $height = 400, $data = null)
    {
        return $this->factory->newImage($width, $height, $data);
    }

    /**
     * @param Image $image
     */
    public function setSplineData(Image $image)
    {
        $coordinates = [
            [40, 80],
            [280, 60],
            [340, 166],
            [590, 120]
        ];
        $settings = [
            "R" => 255,
            "G" => 255,
            "B" => 255,
            "ShowControl" => true
        ];
        $image->drawSpline($coordinates, $settings);
    }
}
