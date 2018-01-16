<?php

use PHLAK\StrGen;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function test_it_can_be_initialized()
    {
        $generator = new StrGen\Generator;

        $this->assertInstanceOf(StrGen\Generator::class, $generator);
    }

    public function test_it_can_generate_a_string_without_configuration()
    {
        $generator = new StrGen\Generator;

        $default = $generator->generate();
    }

    public function test_it_throws_an_exception_when_passing_an_invalid_type_to_charset()
    {
        $generator = new StrGen\Generator;

        $this->setExpectedException(\InvalidArgumentException::class);

        $custom = $generator->charset(1337);
    }

    public function test_it_throws_an_exception_when_passing_an_invalid_type_to_length()
    {
        $generator = new StrGen\Generator;

        $this->setExpectedException(\InvalidArgumentException::class);

        $custom = $generator->length(true);
    }

    public function test_it_can_generate_a_string_from_a_custom_character_set()
    {
        $generator = new StrGen\Generator;

        $custom = $generator->charset('0123456789abcdef')->length(16)->generate();

        $this->assertRegExp('/^[0-9a-f]{16}$/', $custom);
    }

    public function test_it_can_generate_a_string_from_the_lower_alpha_character_set()
    {
        $generator = new StrGen\Generator;

        $lowerAlpha = $generator->charset(StrGen\CharSet::LOWER_ALPHA)->length(16)->generate();

        $this->assertRegExp('/^[a-z]{16}$/', $lowerAlpha);
    }

    public function test_it_can_generate_a_string_from_the_upper_alpha_character_set()
    {
        $generator = new StrGen\Generator;

        $upperAlpha = $generator->charset(StrGen\Charset::UPPER_ALPHA)->length(16)->generate();

        $this->assertRegExp('/^[A-Z]{16}$/', $upperAlpha);
    }

    public function test_it_can_generate_a_string_from_the_mixed_alpha_character_set()
    {
        $generator = new StrGen\Generator;

        $mixedAlpha = $generator->charset(StrGen\Charset::MIXED_ALPHA)->length(16)->generate();

        $this->assertRegExp('/^[a-zA-Z]{16}$/', $mixedAlpha);
    }

    public function test_it_can_generate_a_string_from_the_numeric_character_set()
    {
        $generator = new StrGen\Generator;

        $numeric = $generator->charset(StrGen\Charset::NUMERIC)->length(16)->generate();

        $this->assertRegExp('/^[0-9]{16}$/', $numeric);
    }

    public function test_it_can_generate_a_string_from_the_alpha_numeric_character_set()
    {
        $generator = new StrGen\Generator;

        $alphaNumeric = $generator->charset(StrGen\CharSet::ALPHA_NUMERIC)->length(16)->generate();

        $this->assertRegExp('/^[a-zA-Z0-9]{16}$/', $alphaNumeric);
    }

    public function test_it_can_generate_a_string_from_the_special_character_set()
    {
        $generator = new StrGen\Generator;

        $special = $generator->charset(StrGen\CharSet::SPECIAL)->length(16)->generate();

        $this->assertRegExp('/^[!@#$%^&*()-_=+.?{}\[\]<>:;\/\\\|~]{16}$/', $special);
    }

    public function test_it_can_generate_a_string_from_the_all_character_set()
    {
        $generator = new StrGen\Generator;

        $special = $generator->charset(StrGen\CharSet::ALL)->length(16)->generate();

        $this->assertRegExp('/^[a-zA-Z0-9!@#$%^&*()-_=+.?{}\[\]<>:;\/\\\|~]{16}$/', $special);
    }

    public function test_it_can_generate_a_string_from_combined_character_sets()
    {
        $generator = new StrGen\Generator;

        $combined = $generator->charset([
            StrGen\CharSet::LOWER_ALPHA,
            StrGen\CharSet::UPPER_ALPHA,
            StrGen\CharSet::NUMERIC
        ])->length(16)->generate();

        $this->assertRegExp('/^[a-zA-Z0-9]{16}$/', $combined);
    }

    public function test_it_doesnt_generate_the_same_string_twice()
    {
        $generator = new StrGen\Generator;

        $alpha = $generator->charset(StrGen\CharSet::ALL)->length(32)->generate();
        $bravo = $generator->charset(StrGen\CharSet::ALL)->length(32)->generate();

        $this->assertNotEquals($alpha, $bravo);
    }
}
