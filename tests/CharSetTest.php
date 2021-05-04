<?php

namespace PHLAK\StrGen\Tests;

use PHLAK\StrGen;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CharSetTest extends TestCase
{
    public function testItHasALowerAlphaCharactersSet()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyz', StrGen\CharSet::LOWER_ALPHA);
    }

    public function testItHasAnUpperAlphaCharactersSet()
    {
        $this->assertEquals('ABCDEFGHIJKLMNOPQRSTUVWXYZ', StrGen\CharSet::UPPER_ALPHA);
    }

    public function testItHasAMixedAlphaCharactersSet()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', StrGen\CharSet::MIXED_ALPHA);
    }

    public function testItHasANumericCharactersSet()
    {
        $this->assertEquals('0123456789', StrGen\CharSet::NUMERIC);
    }

    public function testItHasAnAlphaNumericCharactersSet()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', StrGen\CharSet::ALPHA_NUMERIC);
    }

    public function testItHasASpecialCharactersSet()
    {
        $this->assertEquals('!@#$%^&*()-_=+.?{}[]<>:;/\|~', StrGen\CharSet::SPECIAL);
    }

    public function testItHasAnAllCharactersSet()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+.?{}[]<>:;/\|~', StrGen\CharSet::ALL);
    }
}
