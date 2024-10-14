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

    public static function resolveControllerUrl( 
        string $controllerPath 
    ): string {
        //REM: Ensure the controllerPath is not empty
        if (empty($controllerPath))
            throw new \InvalidArgumentException("Controller path cannot be empty.");

        Asset::pathCutter( $controllerPath, __DIR_CONTROLLER );

        return $controllerPath;
    }

    public static function resolveViewUrl( 
        string $viewPath 
    ): string {
        //REM: Ensure the viewPath is not empty
        if (empty($viewPath))
            throw new \InvalidArgumentException("View path cannot be empty.");
    
        //REM: Modify the path using pathCutter
        Asset::pathCutter($viewPath, __DIR_VIEW);
    
        return $viewPath;
    }
    
    private static function pathCutter(
        string &$inOuttarget, 
        string $extraPrefix = "", 
        string $subtraction = __BASE_DIR 
    ): void {
        //REM: Ensure that subtraction is not empty to avoid unexpected behavior
        if (empty($subtraction)) {
            throw new \InvalidArgumentException("subtraction directory cannot be empty.");
        }
    
        //REM: Replace base directory and trim slashes
        $inOuttarget = str_replace(
            $subtraction,
            "",
            $extraPrefix . "/" . ltrim($inOuttarget, " /\\")
        );
        $inOuttarget = ltrim($inOuttarget, " /\\");
    
        //REM: Optionally: Check if the result is still valid
        if (empty($inOuttarget))
            throw new \RuntimeException("Resulting view path is empty.");
    }
}