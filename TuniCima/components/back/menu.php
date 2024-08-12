<?php
include "../../backScript.php";

$template = "menu";
$title = "MENU";

CHECK_USER_AUTHEN();

$DB2 = DB_CONNECT("data");

// GET A LIST OF SERIES,SEASONS,EPISODES AND FETCH THEM
$SERIES = RUN_REQ("SELECT * FROM serie",$DB2)->fetchAll();

CLOSE_DB($DB2);

include "../../index.phtml";

?>