<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");
$DB2 = DB_CONNECT("data");

// THIS FUNCTION IS USED TO RETURN A RESULT FOR ACCESS SECTION IS ADMIN PANNEL
function list_of_access($list) {
    $result = [];
    foreach ($list as $key1 => $value1) {
        $result[$key1] = [];
        foreach ($value1 as $key2 => $value2) {
            ($value2 == '1')? $result[$key1][$key2] = 'checked' : $result[$key1][$key2] = '';
        }
    }
    return $result;
}

// CHECK WHETHER THE USER IS ADMIN OR NOT, ONLY ADMINS MAY ENTER!
$ID = $_SESSION["USER_ID"];
$CheckAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$ID' AND (ADD_ADMIN+MODIFY_ADMIN+ADD_FILM+MODIFY_FILM+ACCESS_HISTORY) > 0",$DB)->fetch();

if (!$CheckAccess) {
    PRINT_MSG("<h4>You don't have Access to this Page!<br>Please nogociate with admins to get access</h4>","Access Error");
}
else {
    // GET A LIST OF USERS AND ADMINS AND FETCH THEM
    $USERS = RUN_REQ("SELECT ID FROM access_type WHERE (ADD_ADMIN+MODIFY_ADMIN+ADD_FILM+MODIFY_FILM+ACCESS_HISTORY) = 0",$DB)->fetchAll();
    $ADMINS = RUN_REQ("SELECT ID FROM access_type WHERE (ADD_ADMIN+MODIFY_ADMIN+ADD_FILM+MODIFY_FILM+ACCESS_HISTORY) > 0 AND ID <> 19008 AND ID <> '$ID'",$DB)->fetchAll();
    // ID of '1908' correspond to unique account 'DOMINATOR', in which he has full access and control of all other admins

    // GET A LIST OF ALL USERS ACCESS && HISTORY
    $HISTORYS = RUN_REQ("SELECT * FROM access_history WHERE ID <> 19008",$DB)->fetchAll();
    $attribute = RUN_REQ("SELECT ADD_ADMIN,MODIFY_ADMIN,ADD_FILM,MODIFY_FILM,ACCESS_HISTORY FROM access_type WHERE (ADD_ADMIN+MODIFY_ADMIN+ADD_FILM+MODIFY_FILM+ACCESS_HISTORY) > 0 AND ID <> 19008 AND ID <> '$ID'",$DB)->fetchAll();
    $attribute = list_of_access($attribute);

    // GET A LIST OF SERIES,SEASONS,EPISODES AND FETCH THEM
    $SERIES = RUN_REQ("SELECT * FROM serie",$DB2);
    $SEASONS = RUN_REQ("SELECT * FROM season",$DB2);
    $EPISODES = RUN_REQ("SELECT * FROM episode",$DB2);

    $template = "adminPannel";
    $title = "Admin Pannel";

    include "../../index.phtml";
}

CLOSE_DB($DB,$DB2);

?>