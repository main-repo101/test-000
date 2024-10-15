<?php


namespace test_group\test_000;


session_start();

const SESSION_TIMEOUT_DURATION = 60 * 15; //REM: 15 minutes...

// if( !\isset($_SESSION["user_name"]) ) {
//     \header("location: /sign-in");
//     exit();
// }

if( isset($_SESSION["session_time_last_activity"]) && (time() - $_SESSION["session_time_last_activity"]) > SESSION_TIMEOUT_DURATION ) {
    //REM: Reset session after inactive for a "SESSION_TIMEOUT_DURATION".
    session_unset();
    session_destroy();

    // header("location: /sign-in?timeout=1");

    session_start();
    $_SESSION["timeout"] = 1;

    header("location: /sign-in");
    exit();
}

$_SESSION["session_time_last_activity"] = time();


define( "__BASE_DIR", \realpath(".") ?: \realpath( __DIR__ . "../../../../../../" ) );
define( "__RESOURCES", \realpath(__BASE_DIR . "/src/main/resources"));
define( "__PUBLIC_RESOURCES", \realpath(__BASE_DIR . "/public/resources"));

define( "__PROJECT_GROUP", "test_group" );
define( "__PROJECT_NAME", "test_000" );

//REM: [REMARK, TODO] .|. Naming convention for dir macros with prefix '__DIR_' 
define( "__DIR_CONTROLLER", \realpath( __BASE_DIR . "/src/main/php/". __PROJECT_GROUP . "/" . __PROJECT_NAME . "/controller" ) );
define( "__DIR_VIEW", \realpath( __BASE_DIR . "/src/main/php/". __PROJECT_GROUP . "/" . __PROJECT_NAME . "/view" ) );


require_once __BASE_DIR . "/vendor/autoload.php";


