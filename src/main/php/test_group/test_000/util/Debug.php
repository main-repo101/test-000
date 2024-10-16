<?php

namespace test_group\test_000\util;

class Debug {
    public static function var_dump_and_exit(mixed $value): void {
        self::var_dump($value);
        exit();
    }

    public static function var_dump(mixed $value): void {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
    }
}