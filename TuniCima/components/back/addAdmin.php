<?php 
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND ADD_ADMIN = 1",$DB)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO ADD ADMINS!","Access Error");
}
else {
    $ID = $_GET["ID"];
    extract($_POST);

    if (!$_POST) {
        PRINT_MSG("PLEASE SELECT ACCESS TYPES FOR YOUR ADMIN TO ADD");
    }
    else {
        foreach ($_POST as $key => $value) {
            $VAL = (int)isset($value);
            RUN_REQ("UPDATE access_type SET $key = '$VAL' WHERE ID = $ID",$DB);
        }
    PRINT_MSG("ADMIN HAS BEEN ADDED SUCCESSFULY!","success","success");
    }
}

CLOSE_DB($DB);

?>