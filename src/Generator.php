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
