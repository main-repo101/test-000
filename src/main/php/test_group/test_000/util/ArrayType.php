<?php

namespace test_group\test_000\util;

enum ArrayType : int {
    case ASSOC  = 0;
    case FLAT   = 1;
    case NONE   = 2;

    public function getDescription(): string {
        return match( $this ) {
            ArrayType::ASSOC    => "Array Associative...",
            ArrayType::FLAT     => "Array flat...",
            ArrayType::NONE     => "Array become string...",
            default             => "ArrayType cannot be resolve..."
        };
    }

    public function isAssociative(): bool {
        return $this === ArrayType::ASSOC;
    }
    public static function parseToAssocArray(string $queryStr): array {
        \parse_str($queryStr, $assocArray);
        return $assocArray;
    }
}