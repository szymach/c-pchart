Table of contents:
==================
* [Support](#support)
* [Build status](#build-status)
* [Code quality](#code-quality)
* [About](#about)
* [License](#license)
* [Contributing](#contributing)
* [Installation](#installation-via-composer)
* [Usage](#usage)
    - [Charts created through Image class](#charts-created-through-image-class)
    - [Standalone charts](#standalone-charts)
    - [Barcodes](#barcodes)
    - [Cache](#cache)
    - [Fonts and palletes](#fonts-and-palletes)
* [Changelog](#changelog)
* [References](#references)
* [Links](#links)

Support:
========

This project is supported in a basic manner and no new features will be introduced.
Issues and pull requests will be reviewed and resolved if need be, so feel free
to post them.

Build status:
=============
[![Build Status](https://travis-ci.org/szymach/c-pchart.svg?branch=2.0)](https://travis-ci.org/szymach/c-pchart)

Code quality:
=============
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/szymach/c-pchart/badges/quality-score.png?b=2.0)](https://scrutinizer-ci.com/g/szymach/c-pchart/?branch=2.0)
[![Code Coverage](https://scrutinizer-ci.com/g/szymach/c-pchart/badges/coverage.png?b=2.0)](https://scrutinizer-ci.com/g/szymach/c-pchart/?branch=2.0)

About:
======

This library is a port of the excellent pChart statistics library created by Jean-Damien Pogolotti,
and aims to allow the usage of it in modern applications. This was done through
applying PSR standards to code, introducing namespaces and typehints, along with
some basic annotations to methods.

This is the `2.x` version, which aims to further update the code, but with the least
backwards compatibility breaks possible. However if you cannot risk any of these,
you will need to use the `1.x` branch.

What was done:

- Support for PHP versions from 5.4 to 7.1.

- Made a full port of the library's functionality. I have touched very little of
the actual logic, so most code from the original library should work.

- Defined and added namespaces to all classes.

- Replaced all `exit()` / `die()` commands with `throw` statements.

- Refactored the code to meet PSR-2 standard and added annotations (as best as I could figure them out)
to methods Also, typehinting was added to methods where possible, so some backwards compatibility breaks
may occur if you did some weird things.

- Moved all constants to a single file `src/Resources/data/constants.php`. It is loaded automatically
through Composer, so no need for manual action.

License:
========

It was previously stated that this package uses the [MIT](https://opensource.org/licenses/MIT) license,
which did not meet the requirements set by the original author. It is now under the
[GNU GPL v3](http://www.gnu.org/licenses/gpl-3.0.html) license, so if you wish to
use it in a commercial project, you need to pay an [appropriate fee](http://www.pchart.net/license).

Contributing:
=============

All in all, this is a legacy library ported over from PHP 4, so the code is neither
beautiful nor easy to understand. I did my best to modernize and cover it with
some basic tests, but there is much more that could be done. If you are willing and
have time to fix or improve anything, feel free to post a PR or issue.

Installation (via Composer):
============================

For composer installation, add:

```json
"require": {
    "szymach/c-pchart": "^2.0"
},
```

to your composer.json file and update your dependencies. Or you can run:

```sh
$ composer require szymach/c-pchart
```

in your project's root directory.

Usage:
======

Your best source to understanding how to use the library is still the [official wiki](http://wiki.pchart.net/).
However, I have ported at least one example for each chart into Markdown files,
so you can compare each version and figure out how to use the current implementation.

Charts created through Image class
---------------------------------------

Most of the basic charts are created through methods of the `CpChart\Chart\Image`
class. Below you can find a full list of these charts, alongside example code.

- [area](doc/area.md)
- [bar](doc/bar.md)
- [best fit](doc/best_fit.md)
- [filled spline](doc/filled_spline.md)
- [filled step](doc/filled_step.md)
- [line](doc/line.md)
- [plot](doc/plot.md)
- [progress](doc/progress.md)
- [spline](doc/spline.md)
- [stacked area](doc/stacked_area.md)
- [stacked bar](doc/stacked_bar.md)
- [step](doc/step.md)
- [zone](doc/zone.md)

Standalone charts:
------------------------------------

The more advanced charts have their own separate class you need to use in order
to create them. As before, below is a full list of these, with example code.

- [2D pie](doc/2d_pie.md)
- [3D pie](doc/3d_pie.md)
- [2D ring](doc/2d_ring.md)
- [3D ring](doc/3d_ring.md)
- [bubble](doc/bubble.md)
- [contour](doc/contour.md)
- [polar](doc/polar.md)
- [radar](doc/radar.md)
- [scatter best fit](doc/scatter_best_fit.md)
- [scatter line](doc/scatter_line.md)
- [scatter plot](doc/scatter_plot.md)
- [scatter spline](doc/scatter_spline.md)
- [scatter threshold](doc/scatter_threshold.md)
- [scatter threshold area](doc/scatter_threshold_area.md)
- [split path](doc/split_path.md)
- [spring](doc/spring.md)
- [stock](doc/stock.md)
- [surface](doc/surface.md)

Barcodes
--------

The pChart library also provides a way to render barcodes 39 and 128. Below you
can find links to doc on creating them:

- [barcode39](doc/barcode_39.md)
- [barcode128](doc/barcode_128.md)

Cache
-----

If you find yourself creating charts out of a set of data more than once, you may
consider using the cache component of the library. Head on to the [dedicated part](doc/cache.md)
of the documentation for information on how to do that.

Fonts and palletes
------------------

If you want to use any of the fonts or palletes files, provide only
the name of the actual file, do not add the `fonts` or `palettes` folder to the
string given into the function. If you want to load them from a different directory
than the default, you need to add the full path to the file (ex. `__DIR__.'/folder/to/my/palletes`).

References
==========
[The original pChart website](http://www.pchart.net/)

Links
=====

[GitHub](https://github.com/szymach/c-pchart)

[Packagist](https://packagist.org/packages/szymach/c-pchart)
