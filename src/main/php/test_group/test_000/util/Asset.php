<?php

namespace test_group\test_000\util;


class Asset {

    public static function resolvePublicRezUrl( string $resourcePath ): string {
        $url = str_replace(
            __BASE_DIR,
            "",
            __PUBLIC_RESOURCES . '/' . ltrim($resourcePath, " /\\")
        );
        return ltrim($url, " /\\");
    }

    public static function resolvePrivateRezUrl( string $resourcePath ): string {
        $url = str_replace(
            __BASE_DIR,
            "",
            __RESOURCES . '/' . ltrim($resourcePath, " /\\")
        );
        return ltrim($url, " /\\");
    }

}