<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND MODIFY_ADMIN = 1",$DB)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO MODIFY ADMINS!","Access error");
}
else {
    $ID = $_GET["ID"];
    // GET VARIABLES
    $ADD_ADMIN = (int)isset($_POST["ADD_ADMIN"]);
    $MODIFY_ADMIN = (int)isset($_POST["MODIFY_ADMIN"]);
    $ADD_FILM = (int)isset($_POST["ADD_FILM"]);
    $MODIFY_FILM = (int)isset($_POST["MODIFY_FILM"]);
    $ACCESS_HISTORY = (int)isset($_POST["ACCESS_HISTORY"]);
    
    RUN_REQ("UPDATE access_type SET ADD_ADMIN = '$ADD_ADMIN',MODIFY_ADMIN = '$MODIFY_ADMIN',ADD_FILM = '$ADD_FILM',MODIFY_FILM = '$MODIFY_FILM',ACCESS_HISTORY = '$ACCESS_HISTORY' WHERE ID = $ID",$DB);
    
    PRINT_MSG("ADMIN HAS BEEN ALTERED SUCCESSFULY!","success","success");
}

CLOSE_DB($DB);

?>