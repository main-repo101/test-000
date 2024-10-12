<?php

use test_group\test_000\util\Asset;

?>


<html>

<head>
    <?php
    // \test_group\test_000\util\Debug::var_dump_and_exit($_SERVER);
    require_once Asset::resolvePublicRezUrl("metadata/global-metadata.rez.php");
    ?>
    <link rel="stylesheet" type="text/css"
    href="<?=Asset::resolvePublicRezUrl("css/dashboard-style.rez.css")?>"
    />
    <!-- <title><?= isset($PAGE_TITLE) ? $PAGE_TITLE . " - Dashboard" : 'Test 000 <Dashboard>'; ?></title> //REM: [TODO] .|. Not working...--> 
</head>

<body>
    <?php 
    require_once "view/dashboard.view.php"; 
    ?>
</body>

</html>