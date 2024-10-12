<?php

use test_group\test_000\util\Asset;

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
    href="<?=Asset::resolvePublicRezUrl("css/404-style.rez.css")?>"
    />
</head>

<body>
    <?php 
    require_once "view/404.view.php"; 
    ?>
</body>

</html>