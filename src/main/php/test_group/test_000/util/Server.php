<?php

namespace test_group\test_000\util;

class Server {

    public static function getRequestedURI(): string {
        return $_SERVER["REQUEST_URI"];
    }

    public static function getRequestedPath(): string {
        return parse_url(Server::getRequestedURI())["path"];
    }

    public static function isRequestedPath( string $uri ): bool {
        return $uri === Server::getRequestedPath();
    }

    public static function hadRequestedQuery(): bool {
        return Server::getRequestedQuery() !== null;
    }
    
    public static function getRequestedQuery(): string | null {
        return parse_url(Server::getRequestedURI())["query"];
    }
}