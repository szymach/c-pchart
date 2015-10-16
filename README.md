What is CpChart?
===============

A project bringing Composer support and some basic PHP 5 standards to pChart 2.0 library.
The aim is to allow pChart integration into modern frameworks like Symfony2.

This is the 2.0 version (currently in development and not to be considered stable), which
aims to further update the code, but without changing the functionality if possible. For
safety, you should use versions 1.*.

What was done:

- Made a full port of the library's functionality.

- Defined and added namespaces to all classes.

- Replaced all `exit()` / `die()` commands with `throw` statements to allow a degree of error control.

- Set the code to PSR-2 standard and added annotations (as best as I could figure them out) to methods. 
Also, typehinting was added to methods where possible, so some backwards compatibility breaks may occur.

- Added a factory service for loading the classes.

- Moved all constants to a single file `src/Resources/data/constants.php`. This file is *required*
for the library to function and is now loaded via Composer.

Installation via Composer:
================

For composer installation, add:

>"require": {

>           "szymach/c-pchart": "~2.0@dev"

> },

to your composer.json file and update your dependencies. After that, all
classes are available under `CpChart\Classes` namespace or `CpChart\Services`
for the factory.

If you want the stable version, replace `~2.0@dev` with `1.*`

Usage:
==============

The main difference is that you can either load the class via the 'use' statement
or use the provided factory. An example below. 

```php
require __DIR__.'/../vendor/autoload.php';

use CpChart\Services\CpChartFactory;
use Exception;

try {
    // create a factory class - it will load necessary files automatically,
    // otherwise you will need to add them on your own
    $factory = new CpChartFactory();
    
    // create and populate the CpData class
    $myData = $factory->newData(array(VOID, 3, 4, 3, 5), "Serie1");

    // create the image and set the data
    $myPicture = $factory->newImage(700, 230, $myData);
    $myPicture->setGraphArea(60, 40, 670, 190);
    $myPicture->setFontProperties(
        array(
            "FontName" => "Forgotte.ttf",
            "FontSize" => 11
        )
    );
    
    // creating a pie chart - notice that you specify the type of chart, not class name.
    // not all charts need to be created through this method (ex. the bar chart),
    // some are created via the CpImage class (check the documentation before drawing).
    $pieChart = $factory->newChart("pie", $myPicture, $myData);

    // do the drawing
    $myPicture->drawScale();
    $myPicture->drawSplineChart();   
    $myPicture->Stroke();

} catch (Exception $ex) {
    echo 'There was an error: '.$ex->getMessage();
}
```

Basically, it should work as defined in the pChart 2.0 documentation with added
support for try/catch functionality. The factory class has methods to load all types of 
classes present in the pChart library.

IMPORTANT! If you want to use any of the fonts or palletes files, provide only
the name of the actual file, do not add the 'fonts' or 'palettes' folder to the
string given into the function. If you want to load them from a different directory
than the default, you need to add the full path to the file (ex. `__DIR__.'/folder/to/my/palletes`).

Changelog
=========
1.0 Stable version with basic functionality.

1.1 Added factory service.

1.1.1 Changed chart loading via factory a bit (see class annotations).

1.1.2 Updated service class with Exception handling regarding missing / wrong class name.

1.1.3 The file with classes' constants is now loaded via Composer (thanks to ThaDafinser).

1.1.4 Fixed code-breaking typ (thanks to subtronic).

1.1.5 Added an option to hide the X axis or only it's values (thanks to julien-gm).

1.1.6 Added support for closures in formatting scale (thanks to funkjedi)

2.0@dev Updated all classes to PSR-2 standard, added typehinting where possible, updated
        annotations in methods to be as accurate as possible.

References
==========
[The original pChart website](http://www.pchart.net/)

[Composer](https://getcomposer.org/)

PHP Framework Interoperability Group at GitHub on PHP coding standards:

[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)

[PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)

[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

[PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)

Links
=====

[GitHub](https://github.com/szymach/c-pchart)

[Packagist](https://packagist.org/packages/szymach/c-pchart)
