StrGen
======

Generate random strings (passwords / salts).

Like this project? Donate with Bitcoin: `1K9nTnzobNTHxweMWh9Y7kdbaUvbVm6XoP`


### Install with Composer

```bash
$ composer.phar require phlak/strgen:1.1.*
```


### Example usage

```php
// Initialize StrGen
$string = new StrGen\StrGen();

// Generate a random string of characters
$password = $string->generate(16); // Returns something like '8a*Ag@I0*s0v[S3u'
```


### Character Sets

StrGen has a few built-in character sets available for ease of use. You can
specify which set(s) to use by passing an array of set names to the StrGen class:


**Example using built-in sets:**

```php
$string = new StrGen\StrGen(array('lower', 'upper', 'numeric'));
```


**Available Presets:**

  * `lower`   = `abcdefghijklmnopqrstuvwxyz`
  * `upper`   = `ABCDEFGHIJKLMNOPQRSTUVWXYZ`
  * `numeric` = `0123456789`
  * `special` = `!@#$%^&*()-_=+.?'`
  * `extra`   = `{}[]<>:;/\|~`


**Custom sets:**

You can also manually define a character set by passing a string of characters
to the StrGen class:

```php
$string = new StrGen\StrGen('0123456789abcdef');
```


-----

**Copyright (c) 2014 [Chris Kankewicz](https://www.chriskankiewicz.com)**

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
