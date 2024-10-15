<?php

namespace test_group\test_000\util;

class Server
{
    public const DEFAULT_SESSION_TIMEOUT_DURATION = (60 * 15); //REM: 15 minutes...

    //REM: Session keys as constants to avoid hardcoding strings
    public const SESSION_KEY_USERNAME = "user_name";
    public const SESSION_KEY_LAST_ACTIVITY = "session_time_last_activity";
    public const SESSION_KEY_TIMEOUT = "timeout";

    /**
     * Start the session and manage timeout
     * 
     * @param int $timeoutSecond The timeout duration in seconds (default 15 minutes)
     * @return void
     */
    public static function startSession(
        int $timeoutSecond = self::DEFAULT_SESSION_TIMEOUT_DURATION
    ): void {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();

        //REM: Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);

        //REM: [TODO] .|. Check if the user is authenticated (session contains the user_name)
        // if (!isset($_SESSION[self::SESSION_KEY_USERNAME]))
        //     self::redirectToSignIn();

        //REM: If timeout is enabled, check for session inactivity
        if ($timeoutSecond > 0 && self::isSessionExpired($timeoutSecond)) {
            self::resetSessionForTimeout();
            self::redirectToSignIn();
        }

        //REM: Update the session with the current activity time
        $_SESSION[self::SESSION_KEY_LAST_ACTIVITY] = time();
    }

    public static function endSession(): void {
        session_unset();
        session_destroy();
    }

    /**
     * Check if the session has expired due to inactivity
     * 
     * @param int $timeoutSecond The timeout duration in seconds
     * @return bool True if the session has expired, false otherwise
     */
    protected static function isSessionExpired(int $timeoutSecond): bool
    {
        return isset($_SESSION[self::SESSION_KEY_LAST_ACTIVITY]) 
            && (time() - $_SESSION[self::SESSION_KEY_LAST_ACTIVITY]) > $timeoutSecond;
    }

    /**
     * Reset the session after timeout
     * 
     * @return void
     */
    protected static function resetSessionForTimeout(): void
    {
        self::endSession();
        session_start();     //REM: Start a new session
        session_regenerate_id(true); //REM: Regenerate the session ID for security
        $_SESSION[self::SESSION_KEY_TIMEOUT] = 1; //REM: Set timeout flag
    }

    /**
     * Redirect to the sign-in page
     * 
     * @return void
     */
    protected static function redirectToSignIn(): void
    {
        header("location: /sign-in");
        exit();
    }

    /**
     * Get the timeout status from the session
     * 
     * @return int 1 if timed out, 0 otherwise
     */
    public static function getSessionTimeout(): int
    {
        return $_SESSION[self::SESSION_KEY_TIMEOUT] ?? 0;
    }

    /**
     * Check if the session is in a timed-out state
     * 
     * @return bool True if timed out, false otherwise
     */
    public static function isSessionTimeout(): bool
    {
        return self::getSessionTimeout() != 0;
    }

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
