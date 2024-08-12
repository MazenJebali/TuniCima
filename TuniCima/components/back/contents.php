<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("data");
$ID = $_GET["serieID"];

$SERIE = RUN_REQ("SELECT * FROM serie WHERE ID = '$ID'",$DB)->fetch();
$SEASONS = RUN_REQ("SELECT * FROM season WHERE ID = '$ID'",$DB)->fetchAll();

$template = "contents";
$title = $SERIE["NAME"];

include "../../index.phtml";

CLOSE_DB($DB);

?>