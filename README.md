What is CpChart?
===============

A project bringing Composer support and some basic PHP 5 standards to pChart 2.0 library.
The aim is to allow pChart integration into modern frameworks like Symfony2.

What was done:

- Made a full port of the library's functionality.

- Defined and added namespaces to all classes.

- Replaced all 'exit()' / 'die()' commands with 'throw' statements to allow a degree of error control.

- Reorganized files a bit and refactored code for better readability. Also, basic annotations were added
to functions.

- Added a factory service for loading the libraries classes.

How to install it?
================

[GitHub](https://github.com/szymach/c-pchart)

[Packagist](https://packagist.org/packages/szymach/c-pchart)

For composer installation, add:

>"require": {

> "szymach/c-pchart": "dev-master"

> },

to your composer.json file and update your dependencies. After that, all
classes are available under "CpChart\Classes" namespace (or "CpChart\Services")
for the factory.

How to use it?
==============

The main difference is that you can either load the class via the 'use' statement
or use the provided factory. An example below.


        require __DIR__.'/../vendor/autoload.php';

        use CpChart\Services\chartFactory;

        try {
            // create a factory class
            $factory = new chartFactory();
            
            // create and populate the pData class
            $myData = $factory->newData(array(VOID,3,4,3,5), "Serie 1");

            // create the image and set the data
            $myPicture = $factory->newImage(700,230,$myData);
            $myPicture->setGraphArea(60,40,670,190);
            $myPicture->setFontProperties(array(
                "FontName"=>"Forgotte.ttf",
                "FontSize"=>11)
            );
            
            // do the drawing
            $myPicture->drawScale();
            $myPicture->drawSplineChart();   
            $myPicture->Stroke();
    
        } catch (\Exception $ex) {
            echo 'There was an error: '.$ex->getMessage();
        }

Basically, it should work as defined in the pChart 2.0 documentation with added
support for try/catch functionality. 

IMPORTANT! If you want to use any of the fonts or palletes files, provide only
the name of the actual file, do not add the 'fonts' or 'palettes' folder to the
string given into the function. If you want to load them from a different directory
than the default, you need to add the full path to the file (ex. __DIR__.'/folder/to/my/palletes).

Changelog
=========
1.0 Stable version with basic functionality

1.1 Added factory service

References
==========
[The original pChart website](http://www.pchart.net/)

[Composer](https://getcomposer.org/)

PHP Framework Interoperability Group at GitHub on PHP coding standards:

[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)

[PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)

[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

[PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)