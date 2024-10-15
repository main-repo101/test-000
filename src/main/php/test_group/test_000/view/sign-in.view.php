

<main>
    <h3 class="msg inactive-account">
        <?php
        if( isset($_SESSION["timeout"]) && $_SESSION["timeout"] != 0 )
            echo "Timeout: Inactive account for a long duration of time detected... Please Log-In your account again.";
            unset($_SESSION["timeout"]);
        ?>
    </h3>
    <h1>Sign-In...</h1>
    <?php
    //REM: Do this at authentication where the account is validate to true and make this the very first to be executed.
    // session_regenerate_id(true);
    ?>
</main>
