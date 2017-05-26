StrGen
======

[![Latest Stable Version](https://img.shields.io/packagist/v/phlak/strgen.svg)](https://packagist.org/packages/phlak/strgen)
[![Total Downloads](https://img.shields.io/packagist/dt/phlak/strgen.svg)](https://packagist.org/packages/phlak/strgen)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/phlak/strgen.svg)](https://packagist.org/packages/phlak/strgen)
[![Build Status](https://img.shields.io/travis/PHLAK/StrGen.svg)](https://travis-ci.org/PHLAK/StrGen)

Generate secure random strings (e.g. - passwords / salts).

Like this project? Keep me caffeinated by [making a donation](https://paypal.me/ChrisKankiewicz).


Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phlak/strgen
```

Example Usage
-------------

```php
// Import StrGen
use StrGen;

// Initialize the Generator
$generator = new StrGen\Generator();

// Generate a random string of characters
$password = $generator->generate(16); // Returns something like '8a*Ag@I0*s0v[S3u'
```

### Character Sets

StrGen has a few built-in character sets available for ease of use. You can
specify which set(s) to use by passing an array of set names to the StrGen class:

**Example using built-in sets:**

```php
$generator = new StrGen\Generator(['lower', 'upper', 'numeric']);
```

**Available presets:**

| Key       | Character Set                |
| --------- | ---------------------------- |
| `lower`   | `abcdefghijklmnopqrstuvwxyz` |
| `upper`   | `ABCDEFGHIJKLMNOPQRSTUVWXYZ` |
| `numeric` | `0123456789`                 |
| `special` | `!@#$%^&*()-_=+.?`           |
| `extra`   | `{}[]<>:;/\|~`               |

**Custom sets:**

You can also manually define a character set by passing a string of characters
to the StrGen class:

```php
$generator = new StrGen\Generator('0123456789abcdef');
```

Changelog
---------

A list of changes can be found on the [GitHub Releases](https://github.com/PHLAK/StrGen/releases) page.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHLAK/StrGen/issues).

Copyright
---------

This project is liscensed under the [MIT License](https://github.com/PHLAK/StrGen/blob/master/LICENSE).
