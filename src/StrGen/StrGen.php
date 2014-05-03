<?php

    namespace StrGen;

    use Exception;

    /**
     * Random string generation library.
     *
     * DISCLAIMER: This does NOT generate cryptographically secure random data!
     * However, the randomly generated strings should suffice for user as random
     * passwords or salts.
     *
     * This software is liscensed under the MIT License.
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2014 Chris Kankiewicz
     */
    class StrGen {

        // Reserve some variables
        protected $characterSet = null;

        // Define character sets
        protected $availableSets = array(
            'lower'   => 'abcdefghijklmnopqrstuvwxyz',
            'upper'   => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'numeric' => '0123456789',
            'special' => '!@#$%^&*()-_=+.?',
            'extra'   => '{}[]<>:;/\|~'
        );


        /**
         * Class constructor function.
         *
         * @param string|array $charset A string of characters or an array of pre-defined sets.
         *                              Available sets: lower, upper, numeric, special, extra
         */
        public function __construct($charset = null) {

            // Create empty string
            $characterSet = null;

            if (is_string($charset)) {

                // Set character set to user-defined string
                $characterSet = $charset;

            } elseif (is_array($charset)) {

                // Build character set from array
                foreach ($charset as $set) {
                    $characterSet = $characterSet . $this->availableSets[$set];
                }

            } else {

                // Append all characters to the full character set
                foreach ($this->availableSets as $set) {
                    $characterSet = $characterSet . $set;
                }

            }

            // Set the character set to the shuffled sting
            $this->characterSet = str_shuffle($characterSet);

        }


        /**
         * Generate a random string of characters with a specified length.
         *
         * @param int $length Length of desired salt
         * @param bool $strict If true, no character will be repeated
         *
         * @return string Random string of specified length
         * @access public
         */
        public function generate($length, $strict = false) {

            // Enforce a valid length
            if (!isset($length) || $length <= 0) {
                throw new Exception('Invalid string length');
            }

            // Available caracter set must be greater than length if strict is true
            if ($strict == true && strlen($this->characterSet) < $length) {
                throw new Exception('Available character set is smaller than string length');
            }

            // Create empty string
            $string = null;

            if ($strict == true) {

                // Shuffle the character set
                $characterSet = str_shuffle($this->characterSet);

                // Pick a random starting position
                $start = mt_rand(0, strlen($characterSet) - $length);

                // Get substring from character set
                $string = substr($characterSet, $start, $length);

            } else {

                // Repeat until desired length is reached
                while (strlen($string) < $length) {

                    // Pick a random character from the pool of available characters
                    $char = substr($this->characterSet, mt_rand(0, strlen($this->characterSet) - 1), 1);

                    // Append character to string
                    $string = $string . $char;

                }

            }

            // Return the string
            return $string;

        }

    }
