<?php

namespace test_group\test_000\util;

class Debug {
    public static function var_dump_and_exit($value): void {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        exit();
    }
}