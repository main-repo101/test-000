<?php
use test_group\test_000\util\Server;
?>

<main>
    <h3 class="msg inactive-account">
        <?php
        if( Server::isSessionTimeout() )
            echo "Timeout: Inactive account for a long duration or period of time detected... Please Log-In your account again.";
            //REM: [TODO] .|. It is essential to unset it after verifying the timeout validity.
            //REM: [TODO] .|. However, it would be preferable if this could be properly done implicitly/automatically.
            unset($_SESSION[Server::SESSION_KEY_TIMEOUT]); 
        ?>
    </h3>
    <h1>Sign-In...</h1>
</main>
