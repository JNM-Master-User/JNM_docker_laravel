<?php

namespace App\Common;

class Helpers
{
    public static function in_array_all($needles, $haystack) {
        return empty(array_diff($needles, $haystack));
    }

    public static function in_array_any_return_bool($needles, $haystack) {
        return !empty(array_intersect($needles, $haystack));
    }

    public static function in_array_any_return_array($needles, $haystack): array
    {
        return (array_intersect($needles, $haystack));
    }
}