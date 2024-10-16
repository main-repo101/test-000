<?php

use test_group\test_000\util\Asset;
use test_group\test_000\util\Response;
use test_group\test_000\util\Server;

//REM: [TODO] .|. Temp global var
// $_SESSION[Server::SESSION_KEY_STATUS] = Response::NOT_FOUND;

// $PAGE_TITLE = isset($PAGE_TITLE) 
//     && !empty(trim($PAGE_TITLE = strval($PAGE_TITLE))) 
//     ? "$PAGE_TITLE - 404" : null;

// if( isset($PAGE_TITLE) ) {
//     if( is_numeric($PAGE_TITLE) )
//         $PAGE_TITLE = strval($PAGE);
//     if( !empty(trim($PAGE_TITLE)) )
//         $PAGE_TITLE .= " - 404 ";
// }

?>


<html>

<head>
    <?php
    require_once Asset::resolvePublicRezUrl("metadata/global-metadata.rez.php");
    ?>
    <link rel="stylesheet" type="text/css"
    href="/<?=Asset::resolvePublicRezUrl("css/404-style.rez.css")?>"
    />
</head>

<body>
    <?php
    require_once Asset::resolveViewUrl("component/header.component.php");
    ?>
    
    <?php 
    require_once Asset::resolveViewUrl("404.view.php"); 
    ?>
    
    <?php
    require_once Asset::resolveViewUrl("component/footer.component.php");
    ?>
    

    <?php
    //REM: [TODO] .|. Cleaning up related resources...
    unset($_SESSION[Server::SESSION_KEY_STATUS]);
    ?>
</body>

</html>