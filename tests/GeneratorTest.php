<?php

namespace PHLAK\StrGen\Tests;

use InvalidArgumentException;
use PHLAK\StrGen;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class GeneratorTest extends TestCase
{
    public function testItCanBeInitialized()
    {
        $generator = new StrGen\Generator;

        $this->assertInstanceOf(StrGen\Generator::class, $generator);
    }

    public function testItCanGenerateAStringWithoutConfiguration()
    {
        $generator = new StrGen\Generator;

        $default = $generator->generate();

        $this->assertIsString($default);
        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9!@#$%^&*()-_=+.?{}\[\]<>:;\/\\\|~]{42}$/', $default);
    }

    public function testItThrowsAnExceptionWhenPassingAnInvalidTypeToCharset()
    {
        $generator = new StrGen\Generator;

        $this->expectException(InvalidArgumentException::class);

        $custom = $generator->charset(null);
    }

    public function testItThrowsAnExceptionWhenPassingAnInvalidTypeToLength()
    {
        $generator = new StrGen\Generator;

        $this->expectException(InvalidArgumentException::class);

        $custom = $generator->length(null);
    }

    public function testItCanUseTheFluentSyntaxToGenerateAStringUsingAnArrayOfPredefinedCharacterSets()
    {
        $generator = new StrGen\Generator;

        $combined = $generator->charset([
            StrGen\CharSet::LOWER_ALPHA,
            StrGen\CharSet::UPPER_ALPHA,
            StrGen\CharSet::NUMERIC,
        ])->length(16)->generate();

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{16}$/', $combined);
    }

    public function testItCanUseTheFluentSyntaxToGenerateAStringUsingACustomCharacterSet()
    {
        $generator = new StrGen\Generator;

        $custom = $generator->charset('0123456789abcdef')->length(16)->generate();

        $this->assertMatchesRegularExpression('/^[0-9a-f]{16}$/', $custom);
    }

    public function testItCanGenerateAStringFromTheLowerAlphaCharacterSet()
    {
        $generator = new StrGen\Generator;

        $lowerAlpha = $generator->lowerAlpha(16);

        $this->assertMatchesRegularExpression('/^[a-z]{16}$/', $lowerAlpha);
    }

    public function testItCanGenerateAStringFromTheUpperAlphaCharacterSet()
    {
        $generator = new StrGen\Generator;

        $upperAlpha = $generator->upperAlpha(16);

        $this->assertMatchesRegularExpression('/^[A-Z]{16}$/', $upperAlpha);
    }

    public function testItCanGenerateAStringFromTheMixedAlphaCharacterSet()
    {
        $generator = new StrGen\Generator;

        $mixedAlpha = $generator->mixedAlpha(16);

        $this->assertMatchesRegularExpression('/^[a-zA-Z]{16}$/', $mixedAlpha);
    }

    public function testItCanGenerateAStringFromTheNumericCharacterSet()
    {
        $generator = new StrGen\Generator;

        $numeric = $generator->numeric(16);

        $this->assertMatchesRegularExpression('/^[0-9]{16}$/', $numeric);
    }

    public function testItCanGenerateAStringFromTheAlphaNumericCharacterSet()
    {
        $generator = new StrGen\Generator;

        $alphaNumeric = $generator->alphaNumeric(16);

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{16}$/', $alphaNumeric);
    }

    public function testItCanGenerateAStringFromTheSpecialCharacterSet()
    {
        $generator = new StrGen\Generator;

        $special = $generator->special(16);

        $this->assertMatchesRegularExpression('/^[!@#$%^&*()-_=+.?{}\[\]<>:;\/\\\|~]{16}$/', $special);
    }

    public function testItCanGenerateAStringFromTheAllCharacterSet()
    {
        $generator = new StrGen\Generator;

        $special = $generator->all(16);

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9!@#$%^&*()-_=+.?{}\[\]<>:;\/\\\|~]{16}$/', $special);
    }

    public function testItCanGenerateAStringFromAnArrayOfCharacterSets()
    {
        $generator = new StrGen\Generator;

        $custom = $generator->custom(16, [
            StrGen\CharSet::LOWER_ALPHA,
            StrGen\CharSet::UPPER_ALPHA,
            StrGen\CharSet::NUMERIC,
        ]);

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]{16}$/', $custom);
    }

    public function testItCanGenerateAStringFromACustomCharacterSet()
    {
        $generator = new StrGen\Generator;

        $custom = $generator->custom(16, '0123456789abcdef');

        $this->assertMatchesRegularExpression('/^[0-9a-f]{16}$/', $custom);
    }

    public function testItDoesntGenerateTheSameStringTwice()
    {
        $generator = new StrGen\Generator;

        $alpha = $generator->charset(StrGen\CharSet::ALL)->length(32)->generate();
        $bravo = $generator->charset(StrGen\CharSet::ALL)->length(32)->generate();

        $this->assertNotEquals($alpha, $bravo);
    }
}
