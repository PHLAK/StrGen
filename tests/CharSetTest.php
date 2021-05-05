<?php

namespace PHLAK\StrGen\Tests;

use PHLAK\StrGen;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CharSetTest extends TestCase
{
    public function test_it_has_a_lower_alpha_characters_set()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyz', StrGen\CharSet::LOWER_ALPHA);
    }

    public function test_it_has_an_upper_alpha_characters_set()
    {
        $this->assertEquals('ABCDEFGHIJKLMNOPQRSTUVWXYZ', StrGen\CharSet::UPPER_ALPHA);
    }

    public function test_it_has_a_mixed_alpha_characters_set()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', StrGen\CharSet::MIXED_ALPHA);
    }

    public function test_it_has_a_numeric_characters_set()
    {
        $this->assertEquals('0123456789', StrGen\CharSet::NUMERIC);
    }

    public function test_it_has_an_alpha_numeric_characters_set()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', StrGen\CharSet::ALPHA_NUMERIC);
    }

    public function test_it_has_a_special_characters_set()
    {
        $this->assertEquals('!@#$%^&*()-_=+.?{}[]<>:;/\|~', StrGen\CharSet::SPECIAL);
    }

    public function test_it_has_an_all_characters_set()
    {
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+.?{}[]<>:;/\|~', StrGen\CharSet::ALL);
    }
}
