<?php

use test_group\test_000\util\Asset;
use test_group\test_000\util\Server;
use test_group\test_000\util\Response;

$status = isset($_SESSION[Server::SESSION_KEY_STATUS]) 
    ? $_SESSION[Server::SESSION_KEY_STATUS]
    : Response::OK;


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
        <img src="/<?=Asset::resolvePublicRezUrl(
            ($status === Response::OK)
            ?"img/img-icon-leaf-check-360x360-000.png"
            :"img/img-icon-leaf-check-red-360x360-000.png"
        )?>"
        />
    </div>
</header>