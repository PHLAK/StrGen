<p align="center">
  <img src="strgen.png" alt="StrGen" width="66%">
</p>

<p align="center">
  <a href="https://packagist.org/packages/phlak/strgen"><img src="https://img.shields.io/packagist/v/phlak/strgen.svg" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/phlak/strgen"><img src="https://img.shields.io/packagist/dt/phlak/strgen.svg" alt="Total Downloads"></a>
  <a href="https://www.ChrisKankiewicz.com"><img src="https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg" alt="Author"></a>
  <a href="https://packagist.org/packages/phlak/strgen"><img src="https://img.shields.io/packagist/l/phlak/strgen.svg" alt="License"></a>
  <a href="https://travis-ci.org/PHLAK/StrGen"><img src="https://img.shields.io/travis/PHLAK/StrGen.svg" alt="Build Status"></a>
  <a href="https://styleci.io/repos/19445250"><img src="https://styleci.io/repos/19445250/shield?branch=master" alt="StyleCI"></a>
</p>

<p align="center">
  PHP library for simple secure random string generation (e.g. - passwords / salts) -- by, <a href="https://www.ChrisKankiewicz.com">Chris Kankiewicz</a> (<a href="https://twitter.com/PHLAK">@PHLAK</a>)
</p>

#### Like this project?

[![Join the community on Spectrum](https://img.shields.io/badge/Join_the_community-PHLAKNET-7a15fe.svg)](https://spectrum.chat/phlaknet)
[![Become a Patron](https://img.shields.io/badge/Become_a-Patron-f96854.svg)](https://patreon.com/PHLAK)
[![One-time Donation](https://img.shields.io/badge/Make_a-Donation-006bb6.svg)](https://paypal.me/ChrisKankiewicz)

Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phlak/strgen
```

Usage
-----

```php
// Import StrGen
use PHLAK\StrGen;

// Initialize the Generator
$generator = new StrGen\Generator();

// Generate a random string of characters
$generator->length(16)->generate(); // Returns something like '8a*Ag@I0*s0v[S3u'
```

### Character Sets

StrGen has a few built-in character sets available for ease of use. You can
specify which set(s) to use by passing a character set or an array of sets to
the `charset()` method.

**Example using built-in sets:**

```php
$generator = new StrGen\Generator();

$generator->charset(StrGen\CharSet::ALPHA_NUMERIC)->generate();

// or

$generator->charset([StrGen\CharSet::MIXED_ALPHA, StrGen\CharSet::NUMERIC])->generate();
```

**Available presets:**

| Key                             | Character Set                |
| ------------------------------- | ---------------------------- |
| `StrGen\CharSet::LOWER_ALPHA`   | `abcdefghijklmnopqrstuvwxyz` |
| `StrGen\CharSet::UPPER_ALPHA`   | `ABCDEFGHIJKLMNOPQRSTUVWXYZ` |
| `StrGen\CharSet::MIXED_ALPHA`   | `abcdefghijklmnopqrstuvwxyz`<br>`ABCDEFGHIJKLMNOPQRSTUVWXYZ` |
| `StrGen\CharSet::NUMERIC`       | `0123456789` |
| `StrGen\CharSet::ALPHA_NUMERIC` | `abcdefghijklmnopqrstuvwxyz`<br>`ABCDEFGHIJKLMNOPQRSTUVWXYZ`<br>`0123456789` |
| `StrGen\CharSet::SPECIAL`       | `!@#$%^&*()-_=+.?{}[]<>:;/\\|~` |
| `StrGen\CharSet::ALL`           | `abcdefghijklmnopqrstuvwxyz`<br>`ABCDEFGHIJKLMNOPQRSTUVWXYZ`<br>`0123456789`<br>`!@#$%^&*()-_=+.?{}[]<>:;/\\|~` |

**Custom sets:**

You can also manually define a character set by passing a string of characters
to the `charset()` method.

```php
$generator = new StrGen\Generator();

$generator->charset('0123456789abcdef')->generate();
```

### Convenience Functions

StrGen also has built-in convenience functions for generating strings from the
included character sets or a custom character set.

```php
$generator->lowerAlpha($length);
$generator->upperAlpha($length);
$generator->mixedAlpha($length);
$generator->numeric($length);
$generator->alphaNumeric($length);
$generator->special($length);
$generator->all($length);
$generator->custom($length, $charset);
```

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/StrGen/releases) page.

Troubleshooting
---------------

For general help and support join our [Spectrum community](https://spectrum.chat/phlaknet).

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/StrGen/issues).

Copyright
---------

This project is licensed under the [MIT License](https://github.com/PHLAK/StrGen/blob/master/LICENSE).
