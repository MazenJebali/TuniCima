<?php 
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND ACCESS_HISTORY = 1",$DB)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO DELETE HISTORY!","Access Error");
}
else {
    RUN_REQ("DELETE FROM access_history",$DB);
    PRINT_MSG("HISTORY DELETED SUCCESSFULY!","success","success");
}

CLOSE_DB($DB);

?>