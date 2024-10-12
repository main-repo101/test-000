<?php

namespace test_group\test_000\model;


enum Gender : string {
    case MALE = "Male";
    case FEMALE = "Female";

    public function getDescription(): string {
        return match( $this ) {
            self::MALE => "Male...",
            self::FEMALE => "Female...",
            default => "other category..."
        };
    }

    public function isOther(): bool {
        return $this !== Gender::MALE && $this !== Gender::FEMALE;
    }
}