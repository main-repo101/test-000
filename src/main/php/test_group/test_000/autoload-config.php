<?php


namespace test_group\test_000;


define( "__BASE_DIR", \realpath(".") ?: \realpath( __DIR__ . "../../../../../../" ) );
define( "__RESOURCES", \realpath(__BASE_DIR . "/src/main/resources"));
define( "__PUBLIC_RESOURCES", \realpath(__BASE_DIR . "/public/resources"));

define( "__PROJECT_GROUP", "test_group" );
define( "__PROJECT_NAME", "test_000" );

//REM: [REMARK, TODO] .|. Naming convention for dir macros with prefix '__DIR_' 
define( "__DIR_CONTROLLER", \realpath( __BASE_DIR . "/src/main/php/". __PROJECT_GROUP . "/" . __PROJECT_NAME . "/controller" ) );
define( "__DIR_VIEW", \realpath( __BASE_DIR . "/src/main/php/". __PROJECT_GROUP . "/" . __PROJECT_NAME . "/view" ) );


require_once __BASE_DIR . "/vendor/autoload.php";



use test_group\test_000\util\Server;


Server::startSession();


