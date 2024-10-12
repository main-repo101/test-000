<?php

use test_group\test_000\util\Asset;

?>

<html>

<head>
    <?php
    require_once Asset::resolvePublicRezUrl("metadata/global-metadata.rez.php");
    ?>
    <link rel="stylesheet" type="text/css"
    href="<?=Asset::resolvePublicRezUrl("css/sign-in-style.rez.css")?>"
    />
    <!-- <title><?= isset($PAGE_TITLE) ? $PAGE_TITLE . " - Sign-In" : 'Test 000 <Sign-In>'; ?></title> //REM: [TODO] .|. Not working...--> 
</head>

<body>
    <?php
    require_once "view/sign-in.view.php";
    ?>
</body>

</html>