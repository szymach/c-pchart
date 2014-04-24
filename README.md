What is CpChart?
===============

A project bringing Composer support and some basic PHP 5 standards to pChart 2.0 library.
The aim is to allow pChart integration into modern frameworks.

What was done:

- Made a full port of the library's functionality.

- Defined and added namespaces to all classes.

- Replaced all 'exit()' / 'die()' commands with 'throw' statements to allow a degree of error control.

- Reorganized files a bit and refactored code for better readability. Also, basic annotations were added
to functions.

How to install it?
================

Manual download: 

[GitHub](https://github.com/szymach/cp-chart)

[Packagist](https://packagist.org/packages/szymach/cp-chart)

For composer installation, add:

>"require": {

>> "szymach/c-pchart": "1.0"

> },

to your composer.json file and update your dependencies. After that, all
classes are available under "CpChart\Classes" namespace.

How to use it?
==============

The main difference is replacing the 'require/include' commands with 'use'
statements (or you can prefix each class name with the namespace). 
You could also create a service for loading the classes without
having to add all these by yourself.

<code>

        require __DIR__.'/../vendor/autoload.php';

        use CpChart\Classes\pData;

        use CpChart\Classes\pImage;

        try {

            $myData = new pData();

            $myData->addPoints(array(VOID,3,4,3,5));

            $myPicture = new pImage(700,230,$myData);

            $myPicture->setGraphArea(60,40,670,190);

            $myPicture->setFontProperties(array(
                "FontName"=>"Forgotte.ttf",
                "FontSize"=>11)
            );

            $myPicture->drawScale();

            $myPicture->drawSplineChart();   

            $myPicture->Stroke();
    
        } catch (\Exception $ex) {
            echo 'There was an error: '.$ex->getMessage();
        }
</code>

Basically, it should work as defined in the pChart 2.0 documentation with added
support for try/catch functionality. 

IMPORTANT! If you want to use any of the fonts or palletes files, provide only
the name of the actual file, do not add the 'fonts' or 'palettes' folder to the
string given into the function. If you want to load them from a different directory
than the default, you need to add the whole file path to the file.
References
==========
[The original pChart website](http://www.pchart.net/)

[Composer](https://getcomposer.org/)

PHP Framework Interoperability Group at GitHub on PHP coding standards:

[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)

[PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)

[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

[PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)