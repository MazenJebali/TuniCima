<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND MODIFY_ADMIN = 1",$DB)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO DELETE ADMINS!","Access error");
}
else {
    $ID = $_GET["ID"];

    RUN_REQ("UPDATE access_type SET ADD_ADMIN = 0,MODIFY_ADMIN = 0,ADD_FILM = 0,MODIFY_FILM = 0,ACCESS_HISTORY = 0  WHERE ID = '$ID' ",$DB);
    
    PRINT_MSG("ADMIN HAS BEEN DELETED!","success","success");
}

CLOSE_DB($DB);

?>