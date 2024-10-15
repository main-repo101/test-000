<?php

use test_group\test_000\util\Asset;


// if( isset($_SESSION["user_name"]) ) {
//     header("location: /");
//     exit();
// }

// $PAGE_TITLE = isset($PAGE_TITLE) 
//     && !empty(trim($PAGE_TITLE = strval($PAGE_TITLE))) 
//     ? "$PAGE_TITLE - Sign-In" : null;

// if( isset($PAGE_TITLE) ) {
//     if( is_numeric($PAGE_TITLE) )
//         $PAGE_TITLE = strval($PAGE);
//     if( !empty(trim($PAGE_TITLE)) )
//         $PAGE_TITLE .= " - Sign-In ";
// }

?>

<html>

<head>
    <?php
    require_once Asset::resolvePublicRezUrl("metadata/global-metadata.rez.php");
    ?>
    <link rel="stylesheet" type="text/css"
    href="/<?=Asset::resolvePublicRezUrl("css/sign-in-style.rez.css")?>"
    />
</head>

<body>
    <?php
    require_once Asset::resolveViewUrl("component/header.component.php");
    ?>

    <?php
    require_once Asset::resolveViewUrl("sign-in.view.php");
    ?>

    <?php
    require_once Asset::resolveViewUrl("component/footer.component.php");
    ?>
</body>

</html>