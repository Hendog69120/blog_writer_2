<?php

function connect() {
    session_start();

    header("Location: http://localhost/projet4/index.php");
    exit;
}