What is CpChart?
===============

A project bringing Composer support and PHP 5 standards to pChart 2.0 library.
The aim is to allow pChart integration into modern frameworks.

What was done:

- Defined and added namespaces to all classes.

- Replaced all 'exit()' / 'die()' commands with 'throw' statements to allow a degree of error control.

- Reorganized files a bit and refactored code for better readability. Also, basic annotations were added
to functions.

HOWEVER THIS IS WORK STILL IN PROGRESS AND SHOULD NOT BE USED YET.

A tested and usable versions should appear in the following days.
Where to get it?
================
For the time being at [GitHub](https://github.com/szymach/CpChart).

Will add it to packagist later.


How to install it?
==================

Add:

"require": {
    "szymach/CpChart": "1.0.0-dev"
},

to your composer.json file and update your dependencies. After that, all
classes are available under "CpChart\Classes" namespace.

References
==========
[The original pChart website](http://www.pchart.net/)

[Composer](https://getcomposer.org/)

PHP Framework Interoperability Group at GitHub on PHP coding standards:

[PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)

[PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)

[PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

[PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)