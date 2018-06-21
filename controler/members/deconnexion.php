<?php

function deconnect() {
    session_destroy();

    header("Location: http://localhost/projet4/index.php");
    exit;
}
