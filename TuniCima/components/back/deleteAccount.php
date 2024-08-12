<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");

$ID = $_SESSION["USER_ID"];

if ($ID == 19008) {
    PRINT_MSG("You can't delete this account!","delete Account","danger");
}
else {
    RUN_REQ("DELETE FROM user WHERE ID = '$ID'",$DB);
    
    // delete account photo from the server if exist
    if (file_exists($_SESSION["USER_LOGO"])) {
        unlink($_SESSION["USER_LOGO"]);
    };

    // delete variables
    unset($_SESSION["USER_ID"]);
    unset($_SESSION["USER_USERNAME"]);
    unset($_SESSION["USER_PASSWORD"]);
    unset($_SESSION["USER_LOGO"]);
    // close session
    session_destroy();
    
    PRINT_MSG("Account Deleted Successfuly<br>
    <a href='authentication.php' class='link-secondary'><button class='btn btn-primary'>login</button></a>","delete Account","danger");
}

CLOSE_DB($DB);

?>