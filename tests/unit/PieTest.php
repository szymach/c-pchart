<?php

namespace Test\CpChart;

use Codeception\Test\Unit;
use CpChart\Chart\Data;
use CpChart\Chart\Image;
use CpChart\Chart\Pie;
use UnitTester;

class PieTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testChartRender()
    {
        $myData = new Data([40, 60, 15, 10, 6, 4], "ScoreA");
        $myData->setSerieDescription("ScoreA", "Application A");
        $myData->addPoints(["<10", "10<>20", "20<>40", "40<>60", "60<>80", ">80"], "Labels");
        $myData->setAbscissa("Labels");
        $myPicture = new Image(700, 230, $myData);
        $backgroundSettings = [
            "R" => 173,
            "G" => 152,
            "B" => 217,
            "Dash" => 1,
            "DashR" => 193,
            "DashG" => 172,
            "DashB" => 237
        ];
        $myPicture->drawFilledRectangle(0, 0, 700, 230, $backgroundSettings);
        $gradientSettings = [
            "StartR" => 209,
            "StartG" => 150,
            "StartB" => 231,
            "EndR" => 111,
            "EndG" => 3,
            "EndB" => 138,
            "Alpha" => 50
        ];
        $myPicture->drawGradientArea(0, 0, 700, 230, DIRECTION_VERTICAL, $gradientSettings);
        $myPicture->drawGradientArea(
            0,
            0,
            700,
            20,
            DIRECTION_VERTICAL,
            [
                "StartR" => 0,
                "StartG" => 0,
                "StartB" => 0,
                "EndR" => 50,
                "EndG" => 50,
                "EndB" => 50,
                "Alpha" => 100
            ]
        );

        $myPicture->drawRectangle(0, 0, 699, 229, ["R" => 0, "G" => 0, "B" => 0]);
        $myPicture->setFontProperties(["FontName" => "Silkscreen.ttf", "FontSize" => 6]);
        $myPicture->drawText(10, 13, "pPie - Draw 2D pie charts", ["R" => 255, "G" => 255, "B" => 255]);
        $myPicture->setFontProperties(
            ["FontName" => "Forgotte.ttf", "FontSize" => 10, "R" => 80, "G" => 80, "B" => 80]
        );
        $myPicture->setShadow(
            true,
            ["X" => 2, "Y" => 2, "R" => 150, "G" => 150, "B" => 150, "Alpha" => 100]
        );
        $myPicture->drawText(
            140,
            200,
            "Single AA pass",
            ["R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE]
        );
        $pieChart = new Pie($myPicture, $myData);
        $pieChart->draw2DPie(140, 125, ["SecondPass" => false]);
        $pieChart->draw2DPie(340, 125, ["DrawLabels" => true, "Border" => true]);
        $pieChart->draw2DPie(
            540,
            125,
            [
                "DataGapAngle" => 10,
                "DataGapRadius" => 6,
                "Border" => true,
                "BorderR" => 255,
                "BorderG" => 255,
                "BorderB" => 255
            ]
        );
        $myPicture->drawText(
            540,
            200,
            "Extended AA pass / Splitted",
            ["R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE]
        );

        $filename = $this->tester->getOutputPathForChart('draw2DPie.png');
        $pieChart->pChartObject->Render($filename);
        $pieChart->pChartObject->stroke();

        $this->tester->seeFileFound($filename);
    }
}
