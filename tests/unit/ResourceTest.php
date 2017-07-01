<?php

namespace Test\CpChart;

use Codeception\Test\Unit;
use CpChart\Data;
use CpChart\Image;
use UnitTester;

class ResourceTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testInvalidResourceLoading()
    {
        $data = new Data();
        $this->tester->expectException('\Exception', function() use ($data) {
            $data->loadPalette('nonExistantPalette');
        });

        $image = new Image(700, 230, $data);

        $this->tester->expectException('\Exception', function() use ($image) {
            $image->setResourcePath('nonExistantDirectory');
        });
        $this->tester->expectException('\Exception', function() use ($image) {
            $image->setFontProperties(["FontName" => "nonExistantFont"]);
        });
        $this->tester->expectException('\Exception', function() use ($image) {
            $image->getLegendSize(['Font' => 'nonExistantFont']);
        });
    }
}
