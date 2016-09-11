<?php

class StrGenTest extends PHPUnit_Framework_TestCase
{
    /** @var Generator Instance of StrGen\Generator */
    protected $generator;

    public function test_it_can_be_initialized_without_arguments()
    {
        $generator = new StrGen\Generator();
        $this->assertRegExp('/^.{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_a_custom_charachter_set()
    {
        $generator = new StrGen\Generator('0123456789abcdef');
        $this->assertRegExp('/^[0-9a-f]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_the_lower_alpha_charachter_set()
    {
        $generator = new StrGen\Generator(['lower']);
        $this->assertRegExp('/^[a-z]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_the_upper_alpha_charachter_set()
    {
        $generator = new StrGen\Generator(['upper']);
        $this->assertRegExp('/^[A-Z]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_the_numeric_charachter_set()
    {
        $generator = new StrGen\Generator(['numeric']);
        $this->assertRegExp('/^[0-9]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_the_special_charachter_set()
    {
        $generator = new StrGen\Generator(['special']);
        $this->assertRegExp('/^[!@#$%^&*()-_=+.?]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_the_extra_charachter_set()
    {
        $generator = new StrGen\Generator(['extra']);
        $this->assertRegExp('/^[{}\[\]<>:;\/\\\|~]{16}$/', $generator->generate(16));
    }

    public function test_it_can_be_initialized_with_combined_charachter_sets()
    {
        $generator = new StrGen\Generator(['upper', 'lower', 'numeric']);
        $this->assertRegExp('/^[a-zA-Z0-9]{16}$/', $generator->generate(16));
    }

    public function test_it_doesnt_generate_the_same_string_twice()
    {
        $generator = new StrGen\Generator();
        $this->assertNotEquals($generator->generate(32), $generator->generate(32));
    }
}
