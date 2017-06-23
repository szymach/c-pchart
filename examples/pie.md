# Drawing a bar chart

```php
require __DIR__.'/../vendor/autoload.php';

use CpChart\Chart\Pie;
use CpChart\Factory\Factory;
use Exception;

try {
    $factory = new Factory();

    // Create and populate data
    $myData = $factory->newData(array(40, 60, 15, 10, 6, 4), "ScoreA");
    $myData->setSerieDescription("ScoreA", "Application A");

    // Define the absissa serie
    $myData->addPoints(array("<10", "10<>20", "20<>40", "40<>60", "60<>80", ">80"), "Labels");
    $myData->setAbscissa("Labels");

    // Create the image
    $myPicture = $factory->newImage(700, 230, $myData);

    // Draw a solid background
    $backgroundSettings = array(
        "R" => 173,
        "G" => 152,
        "B" => 217,
        "Dash" => 1,
        "DashR" => 193,
        "DashG" => 172,
        "DashB" => 237
    );
    $myPicture->drawFilledRectangle(0, 0, 700, 230, $backgroundSettings);

    //Draw a gradient overlay
    $gradientSettings = array(
        "StartR" => 209,
        "StartG" => 150,
        "StartB" => 231,
        "EndR" => 111,
        "EndG" => 3,
        "EndB" => 138,
        "Alpha" => 50
    );
    $myPicture->drawGradientArea(0, 0, 700, 230, DIRECTION_VERTICAL, $gradientSettings);
    $myPicture->drawGradientArea(
        0,
        0,
        700,
        20,
        DIRECTION_VERTICAL,
        array(
            "StartR" => 0,
            "StartG" => 0,
            "StartB" => 0,
            "EndR" => 50,
            "EndG" => 50,
            "EndB" => 50,
            "Alpha" => 100
        )
    );

    // Add a border to the picture
    $myPicture->drawRectangle(0, 0, 699, 229, array("R" => 0, "G" => 0, "B" => 0));

    // Write the picture title
    $myPicture->setFontProperties(array("FontName" => "Silkscreen.ttf", "FontSize" => 6));
    $myPicture->drawText(10, 13, "pPie - Draw 2D pie charts", array("R" => 255, "G" => 255, "B" => 255));

    // Set the default font properties
    $myPicture->setFontProperties(
        array("FontName" => "Forgotte.ttf", "FontSize" => 10, "R" => 80, "G" => 80, "B" => 80)
    );

    // Enable shadow computing
    $myPicture->setShadow(
        true,
        array("X" => 2, "Y" => 2, "R" => 150, "G" => 150, "B" => 150, "Alpha" => 100)
    );
    $myPicture->drawText(
        140,
        200,
        "Single AA pass",
        array("R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE)
    );

    // Create and draw the chart
    /* @var $pieChart CpPie */
    $pieChart = $factory->newChart("pie", $myPicture, $myData);
    $pieChart->draw2DPie(140, 125, array("SecondPass" => false));
    $pieChart->draw2DPie(340, 125, array("DrawLabels" => true, "Border" => true));
    $pieChart->draw2DPie(
        540,
        125,
        array(
            "DataGapAngle" => 10,
            "DataGapRadius" => 6,
            "Border" => true,
            "BorderR" => 255,
            "BorderG" => 255,
            "BorderB" => 255
        )
    );
    $myPicture->drawText(
        540,
        200,
        "Extended AA pass / Splitted",
        array("R" => 0, "G" => 0, "B" => 0, "Align" => TEXT_ALIGN_TOPMIDDLE)
    );

    // Save the chart to a test directory and output it to a browser
    $pieChart->pChartObject->Render("charts/example.draw2DPie.png");
    $pieChart->pChartObject->stroke();
} catch (Exception $ex) {
    echo sprintf('There was an error: %s', $ex->getMessage());
}
```

