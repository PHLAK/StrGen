<?php

    class StrGenTest extends PHPUnit_Framework_TestCase {

        public function testLength() {

            // Initialize StrGen
            $string = new StrGen\StrGen();

            // Test the output
            $this->assertEquals(16, strlen($string->generate(16)));

        }

    }
