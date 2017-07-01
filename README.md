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
    - [Fonts and palletes](#fonts-and-palletes)
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

It was previously stated that this package is on [MIT](https://opensource.org/licenses/MIT) license,
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

The more advanced charts have their own separate class you need to use in order
to create them. As before, below is a full list of these, with example code.

- [2D pie](examples/2d_pie.md)
- [3D pie](examples/3d_pie.md)
- [2D ring](examples/2d_ring.md)
- [3D ring](examples/3d_ring.md)
- [bubble](examples/bubble.md)
- [contour](examples/contour.md)
- [polar](examples/polar.md)
- [radar](examples/radar.md)
- [scatter best fit](examples/scatter_best_fit.md)
- [scatter line](examples/scatter_line.md)
- [scatter plot](examples/scatter_plot.md)
- [scatter spline](examples/scatter_spline.md)
- [scatter threshold](examples/scatter_threshold.md)
- [scatter threshold area](examples/scatter_threshold_area.md)
- [split path](examples/split_path.md)
- [spring](examples/spring.md)
- [stock](examples/stock.md)
- [surface](examples/surface.md)

Barcodes
--------

The pChart library also provides a way to render barcodes 39 and 128. Below you
can find links to examples on creating them:

- [barcode39](examples/barcode_39.md)
- [barcode128](examples/barcode_128.md)

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
