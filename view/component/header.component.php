<?php

use test_group\test_000\util\Asset;
use test_group\test_000\util\Server;

?>

<header>
    <div id="header-ceil">
        <nav>
            <li>
                <a href="/"
                    style="<?= Server::isRequestedPath("/") ? "background-color: lime;" : "background-color: none;" ?>">
                    Home
                </a>
                <a href="/sign-in"
                    style="<?= Server::isRequestedPath("/sign-in") ? "background-color: lime;" : "background-color: none;" ?>">
                    Sign-In
                </a>
                <a href="/sign-up"
                    style="<?= Server::isRequestedPath("/sign-up") ? "background-color: lime;" : "background-color: none;" ?>">
                    Sign-Up
                </a>
            </li>
        </nav>
    </div>
    <div id="header-floor">
        <h2>Header floor...</h2>
        <img src="<?=Asset::resolvePublicRezUrl("img/img-icon-leaf-check-360x360-000.png")?>"
        />
    </div>
</header>