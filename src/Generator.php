<?php

namespace PHLAK\StrGen;

use InvalidArgumentException;

class Generator
{
    /** @var string String of characters used to generate our random string */
    protected $characterSet = CharSet::ALL;

    /** @var int Length of random string to be generated */
    protected $length = 42;

    /**
     * Set the character set to be used for random string generation.
     *
     * @param string|array $charset a string of characters or an array of pre-defined sets
     *
     * @return Generator This Generator object
     */
    public function charset($charset)
    {
        switch (gettype($charset)) {
            case 'string':
                $this->characterSet = $charset;
                break;

            case 'array':
                $this->characterSet = implode($charset);
                break;

            default:
                throw new InvalidArgumentException('Failed to initialize with the specified character set');
        }

        return $this;
    }

    /**
     * Set the desired length of the random string to be generated.
     *
     * @param int $length Desired length of the random string
     *
     * @return Generator This Generator object
     */
    public function length($length)
    {
        if (! is_int($length) || $length <= 0) {
            throw new InvalidArgumentException('Length must be in integer greater than 0');
        }

        $this->length = $length;

        return $this;
    }

    /**
     * Generate a random string of characters.
     *
     * @return string A random string of characters
     */
    public function generate()
    {
        $string = '';
        while (strlen($string) < $this->length) {
            $string .= $this->randomCharacter($this->characterSet);
        }

        return $string;
    }

    /**
     * Generating a random string from the lower alpha character set.
     *
     *     Available Characters: abcdefghijklmnopqrstuvwxyz
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function lowerAlpha($length)
    {
        return $this->charset(CharSet::LOWER_ALPHA)->length($length)->generate();
    }

    /**
     * Generating a random string from the upper alpha character set.
     *
     *     Available Characters: ABCDEFGHIJKLMNOPQRSTUVWXYZ
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function upperAlpha($length)
    {
        return $this->charset(CharSet::UPPER_ALPHA)->length($length)->generate();
    }

    /**
     * Generating a random string from the mixed alpha character set.
     *
     *     Available Characters:
     *       - abcdefghijklmnopqrstuvwxyz
     *       - ABCDEFGHIJKLMNOPQRSTUVWXYZ
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function mixedAlpha($length)
    {
        return $this->charset(CharSet::MIXED_ALPHA)->length($length)->generate();
    }

    /**
     * Generating a random string from the mixed alpha character set.
     *
     *     Available Characters: 0123456789
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function numeric($length)
    {
        return $this->charset(CharSet::NUMERIC)->length($length)->generate();
    }

    /**
     * Generating a random string from the alpha numeric character set.
     *
     *     Available Characters:
     *       - abcdefghijklmnopqrstuvwxyz
     *       - ABCDEFGHIJKLMNOPQRSTUVWXYZ
     *       - 0123456789
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function alphaNumeric($length)
    {
        return $this->charset(CharSet::ALPHA_NUMERIC)->length($length)->generate();
    }

    /**
     * Generating a random string from the special character set.
     *
     *   Available Characters: !@#$%^&*()-_=+.?{}[]<>:;/\|~
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function special($length)
    {
        return $this->charset(CharSet::SPECIAL)->length($length)->generate();
    }

    /**
     * Generating a random string from all available characters.
     *
     *   Available Characters:
     *     - abcdefghijklmnopqrstuvwxyz
     *     - ABCDEFGHIJKLMNOPQRSTUVWXYZ
     *     - 0123456789
     *     - !@#$%^&*()-_=+.?{}[]<>:;/\|~
     *
     * @param int $length Desired length of the random string
     *
     * @return string A random string of characters
     */
    public function all($length)
    {
        return $this->charset(CharSet::ALL)->length($length)->generate();
    }

    /**
     * Generating a random string from a custom character set.
     *
     * @param int          $length  Desired length of the random string
     * @param string|array $charset a string of characters or an array of pre-defined sets
     *
     * @return string A random string of characters
     */
    public function custom($length, $charset)
    {
        return $this->charset($charset)->length($length)->generate();
    }

    /**
     * Get a random character from a string.
     *
     * @param string $string String of characters
     *
     * @return string A single character
     */
    private function randomCharacter($string)
    {
        $max = strlen($string) - 1;
        $int = hexdec(bin2hex(openssl_random_pseudo_bytes(4)));

        return substr($string, $int % $max, 1);
    }
}
