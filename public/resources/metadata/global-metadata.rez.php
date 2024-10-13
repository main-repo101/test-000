
<?php
    use test_group\test_000\util\Asset;
?>

<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="icon" href="/<?=Asset::resolvePublicRezUrl("img/img-icon-leaf-check-360x360-000.png")?>"/>

<link 
    rel="stylesheet" type="text/css" 
    href="/<?=Asset::resolvePublicRezUrl("css/global-style.rez.css")?>"
/>

<title><?=$PAGE_TITLE?? 'Test 000 <default>'?></title>