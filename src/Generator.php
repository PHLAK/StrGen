<?php

namespace StrGen;

use Exception;

/**
 * Random secure string generation library.
 *
 * This software is liscensed under the MIT License.
 *
 * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
 * @copyright 2016 Chris Kankiewicz
 */
class Generator {

    /** @var string|array String of characters or an array of pre-defined sets */
    protected $characterSet = null;

    /** @var array Pre-defined character sets */
    protected $availableSets = [
        'lower'   => 'abcdefghijklmnopqrstuvwxyz',
        'upper'   => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'numeric' => '0123456789',
        'special' => '!@#$%^&*()-_=+.?',
        'extra'   => '{}[]<>:;/\|~'
    ];


    /**
     * StrGen\Generator constructor function, runs on object creation.
     *
     * @param string|array $charset A string of characters or an array of pre-defined sets.
     *                              Available sets: lower, upper, numeric, special, extra
     */
    public function __construct($charset = null) {

        switch (gettype($charset)) {

            case 'string':
                $this->characterSet = $charset;
                break;

            case 'array':
                foreach ($charset as $set) {
                    $this->characterSet .= $this->availableSets[$set];
                }
                break;

            default:
                foreach ($this->availableSets as $set) {
                    $this->characterSet .= $set;
                }
                break;

        }

    }


    /**
     * Generate a random string of characters with a specified length.
     *
     * @param int $length Length of desired string
     *
     * @return string Random string of specified length
     */
    public function generate($length) {

        if ($length <= 0) throw new InvalidArgumentException('$length must be > 0');

        $string = '';

        while (strlen($string) < $length) {
            $string .= $this->randomCharacter($this->characterSet);
        }

        return $string;

    }

    /**
     * Get a random character from a string
     *
     * @param  string $string String of characters
     *
     * @return string         A single character
     */
    private function randomCharacter($string) {
        $max = strlen($this->characterSet) - 1;
        $int = hexdec(bin2hex(openssl_random_pseudo_bytes(4)));
        return substr($this->characterSet, $int % $max, 1);
    }

}
