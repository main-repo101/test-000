<?php

namespace test_group\test_000\util;

class Server
{

    public static function getRequestedURI(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    public static function getRequestedPath(): string
    {
        return parse_url(Server::getRequestedURI(), \PHP_URL_PATH);
    }

    public static function isRequestedPath(string $uri): bool
    {
        return $uri === Server::getRequestedPath();
    }

    public static function hadRequestedQuery(): bool
    {
        return Server::getRequestedQuery() !== null;
    }

    public static function getRequestedQuery(
        ArrayType $arrayType = ArrayType::ASSOC
    ): array | string | null {
        $queryStr = \parse_url(Server::getRequestedURI(), \PHP_URL_QUERY);

        if ($queryStr === null) return null;

        return match ($arrayType) {
            ArrayType::ASSOC => ArrayType::parseToAssocArray($queryStr),
            ArrayType::FLAT  => explode('&', $queryStr),
            ArrayType::NONE  => $queryStr,
            default          => null,
        };
    }
}
