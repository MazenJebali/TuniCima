<?php
include "../../backScript.php";

$template = "signup";
$title = "Create Account";

if (!empty($_POST)) {
    $DB = DB_CONNECT("login");
    // GET VARIABLES
    extract($_POST);
    // CHECKING WHETHER THE USERNAME EXIST, OTHERWISE INSERT IT
    $searchUser = RUN_REQ("SELECT * FROM user WHERE USERNAME = '$user'",$DB)->fetch();
    if ($searchUser) {
        echo "<div class='alert alert-warning' role='alert'>USERNAME already exist in our database, Please use another name!</div>";
    }
    else {
        $random = rand(1000,9999);
        // TO PREVENT SIMILAR ID GENERATION
        while (RUN_REQ("SELECT * FROM user WHERE ID = '$random'",$DB)->fetch()) {
            $random = rand(1000,9999);
        }

        $cryptedPass = password_hash($password,PASSWORD_DEFAULT);

        // move the local picture to server location, otherwise use the link_logo as a picture
        $choosedlogo = "https://placehold.it/50x50";
        if ($link_logo != '') { 
            $choosedlogo = $link_logo;
        }
        else {
            $choosedlogo = UPLOAD_IMG("file","../../assets/logos/");
        };

        // DATA INSERTION INTO DATABASE
        RUN_REQ("INSERT INTO user (ID,USERNAME,PASSWORD,LOGO) VALUES ('$random','$user','$cryptedPass','$choosedlogo')",$DB)->fetch();
        RUN_REQ("INSERT INTO access_type (ID,ADD_ADMIN,MODIFY_ADMIN,ADD_FILM,MODIFY_FILM,ACCESS_FILM,ACCESS_HISTORY) VALUES ('$random',0,0,0,0,1,0)",$DB)->fetch();
        echo "<div class='alert alert-primary' role='alert'>Account Created Successfuly<br>
        <a href='authentication.php' class='link-secondary'><button class='btn btn-primary'>LOGIN PAGE</button></a>
        </div>";
    }
    CLOSE_DB($DB);
}

include "../../index.phtml";

?>