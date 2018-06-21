<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    require('admin.php');
}
else{
    require('formAdmin.php');
}

