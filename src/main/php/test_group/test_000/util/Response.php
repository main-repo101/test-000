<?php

namespace test_group\test_000\util;

enum Response : int {
    case NOT_FOUND  = 404;
    case FORBIDEN   = 403;
    case OK         = 200;

    public function getDescription(): string {
        return match( $this ) {
            self::OK        => "PAGE LOADED SUCCESSFULLY...",
            self::NOT_FOUND => "PAGE NOT FOUND...",
            self::FORBIDEN  => "PAGE FORBIDEN...",
            default         => "PAGE UNKNOWN..."
        };
    }

    public function isSuccess(): bool {
        return $this->value >= 200 && $this->value < 300;
    }
}
