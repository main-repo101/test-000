<?php

use test_group\test_000\util\Asset;

?>


<html>

<head>
    <?php
    require_once Asset::resolvePublicRezUrl("metadata/global-metadata.rez.php");
    ?>
    <link rel="stylesheet" type="text/css"
    href="<?=Asset::resolvePublicRezUrl("css/404-style.rez.css")?>"
    />
    <!-- <title><?= isset($PAGE_TITLE) ? $PAGE_TITLE . " - 404" : 'Test 000 <404>'; ?></title> //REM: [TODO] .|. Not working...--> 
</head>

<body>
    <?php 
    require_once "view/404.view.php"; 
    ?>
</body>

</html>