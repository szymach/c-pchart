# Drawing a spline chart

```php
require __DIR__.'/../vendor/autoload.php';

use CpChart\Factory\Factory;
use Exception;

try {
    // Create a factory class - it will load necessary files automatically,
    // otherwise you will need to add them on your own
    $factory = new Factory();
    $myData = $factory->newData(array(), "Serie1");

    // Create the image and set the data
    $myPicture = $factory->newImage(700, 230, $myData);
    $myPicture->setShadow(
        true,
        array("X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 20)
    );

    // 1st spline drawn in white with control points visible
    $firstCoordinates = array(array(40, 80), array(280, 60), array(340, 166), array(590, 120));
    $fistSplineSettings = array("R" => 255, "G" => 255, "B" => 255, "ShowControl" => true);
    $myPicture->drawSpline($firstCoordinates, $fistSplineSettings);

    // 2nd spline dashed drawn in white with control points visible
    $secondCoordinates = array(array(250, 50), array(250, 180), array(350, 180), array(350, 50));
    $secondSplineSettings = array(
        "R" => 255,
        "G" => 255,
        "B" => 255,
        "ShowControl" => true,
        "Ticks" => 4
    );
    $myPicture->drawSpline($secondCoordinates, $secondSplineSettings);

    // Output the chart to the browser
    $myPicture->Render("example.drawSpline.png");
    $myPicture->Stroke();
} catch (Exception $ex) {
    echo sprintf('There was an error: %s', $ex->getMessage());
}
```
