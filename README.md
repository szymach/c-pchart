Table of contents:
==================
* [Support](#support)
* [About](#about)
* [License](#license)
* [Contributing](#contributing)
* [Installation](#installation-via-composer)
* [Usage](#usage)
    - [Charts created through Image class](#charts-created-through-image-class)
    - [Standalone charts](#standalone-charts)
    - [Notes](#notes)
* [Changelog](#changelog)
* [References](#references)
* [Links](#links)

Support:
========

This project is supported in a basic manner and no new features will be introduced.
Issues and pull requests will be reviewed and resolved if need be, so feel free
to post them.

About:
======

A project bringing Composer support and some basic PHP 5 standards to pChart 2.0 library.
The aim is to allow pChart integration into modern frameworks like Symfony2.

This is the 2.0 version, which aims to further update the code, but without changing
the functionality if possible. It will introduce some minor backwards compatibility breaks,
so if that's a concern, use the 1.* version.

What was done:

- Added support for PHP versions from 5.4 to 7.1.

- Made a full port of the library's functionality.

- Defined and added namespaces to all classes.

- Replaced all `exit()` / `die()` commands with `throw` statements to allow a degree of error control.

- Refactored the code to meet PSR-2 standard and added annotations (as best as I could figure them out).
to methods Also, typehinting was added to methods where possible, so some backwards compatibility breaks
may occur.

- Added a factory service for loading the classes.

- Moved all constants to a single file `src/Resources/data/constants.php`. It is loaded automatically,
so no need for manual action.

License:
========

It was previously stated that this package is on [MIT](https://opensource.org/licenses/MIT) license, which did not meet the requirements
set by the original author. It is now under the [GNU GPL v3](http://www.gnu.org/licenses/gpl-3.0.html)
license, so if you wish to use it in a commercial project, you need to pay an [appropriate fee](http://www.pchart.net/license).

Contributing:
=============

If you wish to contribute to the `1.*` version, there is a branch called `legacy` to which you
may submit pull requests. Otherwise feel free to use the `master` branch.

Installation (via Composer):
============================

For composer installation, add:

```json
"require": {
    "szymach/c-pchart": "^2.0@dev"
},
```

to your composer.json file and update your dependencies. Or you can run:

```sh
$ composer require szymach/c-pchart
```

in your project's root directory.

Usage:
======

Now you can autoload or use the classes via their namespaces. If you want to, you
may utilize the provided factory class. Below are examples of how to use the library,
the charts themselves are borrowed from the [official wiki](http://wiki.pchart.net/).

Charts created through Image class
---------------------------------------

Not all charts need to be created through a seperate class (ex. bar or spline charts),
some are created via the Image class (check the official documentation before drawing).
Below is a list of example code you can use to create these charts:

- [area](examples/area.md)
- [bar](examples/bar.md)
- [best fit](examples/best_fit.md)
- [filled spline](examples/filled_spline.md)
- [filled step](examples/filled_step.md)
- [line](examples/line.md)
- [plot](examples/plot.md)
- [progress](examples/progress.md)
- [spline](examples/spline.md)
- [stacked area](examples/stacked_area.md)
- [stacked bar](examples/stacked_bar.md)
- [step](examples/step.md)

Standalone charts:
------------------------------------

Some charts require using a dedicated class, which you can create via the factory.
Notice that you specify the type of chart, not the class name. An example for a pie
chart below:

- [pie](examples/pie.md)
- [polar](examples/polar.md)
- [radar](examples/radar.md)
- [split path](examples/split_path.md)
- [spring](examples/spring.md)

Notes:
------

Basically, all should work as defined in the pChart 2.0 documentation.

**IMPORTANT!** If you want to use any of the fonts or palletes files, provide only
the name of the actual file, do not add the 'fonts' or 'palettes' folder to the
string given into the function. If you want to load them from a different directory
than the default, you need to add the full path to the file (ex. `__DIR__.'/folder/to/my/palletes`).

References
==========
[The original pChart website](http://www.pchart.net/)

Links
=====

[GitHub](https://github.com/szymach/c-pchart)

[Packagist](https://packagist.org/packages/szymach/c-pchart)
