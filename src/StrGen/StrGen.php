<?php

    namespace StrGen;

    use Exception;

    /**
     * Random string generation library.
     *
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
            $this->characterSet = $characterSet;

        }


        /**
         * Generate a random string of characters with a specified length.
         *
         * @param int $length Length of desired string
         *
         * @return string Random string of specified length
         */
        public function generate($length) {

            // Enforce a valid length
            if (!isset($length) || $length <= 0) {
                throw new Exception('Invalid string length');
            }

            // Create empty string
            $string = null;

            // Repeat until desired length is reached
            while (strlen($string) < $length) {

                // Pick a random character from the pool of available characters
                $char = substr($this->characterSet, $this->randInt(strlen($this->characterSet) - 1), 1);

                // Append character to string
                $string = $string . $char;

            }

            // Return the string
            return $string;

        }


        /**
         * Generate a random integer.
         *
         * @param  int $max Maximum integer value to generate
         *
         * @return int A random integer
         */
        private function randInt($max) {

            // Enforce a valid max
            if (!isset($max) || $max <= 0) {
                throw new Exception('Invalid maximum length');
            }

            // Generate random 32-bit integer
            $randomInt = hexdec(bin2hex(openssl_random_pseudo_bytes(4)));

            // Return integer within limits
            return $randomInt % $max;

        }

    }
