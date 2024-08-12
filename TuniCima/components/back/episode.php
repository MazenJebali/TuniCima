<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("data");
$serieID = $_GET["serieID"];
$seasonID = $_GET["SEASON"];

$SERIE = RUN_REQ("SELECT * FROM serie WHERE ID = '$serieID'",$DB)->fetch();
$SEASON = RUN_REQ("SELECT * FROM season WHERE IND = '$seasonID'",$DB)->fetch();
$EPISODES = RUN_REQ("SELECT * FROM episode WHERE ID = '$seasonID'",$DB)->fetchAll();

$template = "episode";
$title = $SERIE["NAME"]." / ".$SEASON["NAME"];

include "../../index.phtml";

CLOSE_DB($DB);

?>