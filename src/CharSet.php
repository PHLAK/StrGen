<?php

namespace PHLAK\StrGen;

class CharSet
{
    /** @const LOWER_ALPHA Lower case alpha characters */
    const LOWER_ALPHA = 'abcdefghijklmnopqrstuvwxyz';

    /** @const UPPER_ALPHA Upper case alpha characters */
    const UPPER_ALPHA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /** @const MIXED_ALPHA Mixed lower case and upper case alpha characters */
    const MIXED_ALPHA = self::LOWER_ALPHA . self::UPPER_ALPHA;

    /** @const NUMERIC Numerical characters */
    const NUMERIC = '0123456789';

    /** @const ALPHA_NUMERIC Combined upper and lower alpha and numeric characters */
    const ALPHA_NUMERIC = self::MIXED_ALPHA . self::NUMERIC;

    /** @const SPECIAL Special characters */
    const SPECIAL = '!@#$%^&*()-_=+.?{}[]<>:;/\|~';

    /** @const ALL All characters */
    const ALL = self::ALPHA_NUMERIC . self::SPECIAL;
}
