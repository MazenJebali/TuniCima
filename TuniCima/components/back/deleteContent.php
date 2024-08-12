<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("data");
$DB2 = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$content = $_GET["content"];
$id = $_GET["id"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND MODIFY_FILM = 1",$DB2)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO DELETE CONTENT!","Access error");
}
else {
    if ($content != 'serie') {
        RUN_REQ("DELETE FROM $content WHERE IND = '$id'",$DB)->fetch(); // delete episodes and seasons
    }
    else {
        RUN_REQ("DELETE FROM $content WHERE ID = '$id'",$DB)->fetch(); // delete series
    }
    
    PRINT_MSG("Action has been achieved Successfuly","delete content","primary");
}

CLOSE_DB($DB,$DB2);

?>