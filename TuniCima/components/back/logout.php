<?php
session_start();

// delete variables
unset($_SESSION["USER_ID"]);
unset($_SESSION["USER_USERNAME"]);
unset($_SESSION["USER_PASSWORD"]);
unset($_SESSION["USER_LOGO"]);

// close session
session_destroy();

// move to authentification page
header('Location: ./authentication.php');
?>