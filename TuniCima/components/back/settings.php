<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("login");

$ID = $_SESSION["USER_ID"];

if ($ID == 19000) {
    PRINT_MSG("VISITORS CAN'T ACCESS THIS PAGE!","warning");
}
else {
    if (!empty($_POST)) {
        // GET VARIABLES
        extract($_POST);
    
        $searchUser = RUN_REQ("SELECT * FROM user WHERE USERNAME = '$user' AND ID <> '$ID'",$DB)->fetch();
        if ($searchUser) {
            echo "<div class='alert alert-warning' role='alert'>USERNAME already exist in our database, Please use another name!</div>";
        }
        else {
            // UPDATE INFORMATION
            $cryptedPass = password_hash($password,PASSWORD_DEFAULT);
    
            // move the local picture to server location, otherwise use the link_logo as a picture
            $choosedlogo = $_SESSION["USER_LOGO"];
            
            if ($link_logo != '') { 
                $choosedlogo = $link_logo;
            }
            else {
                $choosedlogo = UPLOAD_IMG("change_logo","../../assets/logos/");
            };
    
            RUN_REQ("UPDATE user SET USERNAME = '$user',PASSWORD = '$cryptedPass',LOGO = '$choosedlogo' WHERE ID = '$ID'",$DB);
            echo "<div class='alert alert-primary' role='alert'>Informations updated Successfuly<br>
            <a href='menu.php' class='link-secondary'><button class='btn btn-primary'>main menu</button></a>
            </div>";
            // UPDATE COOKIES
            $_SESSION["USER_USERNAME"] = $user;
            $_SESSION["USER_PASSWORD"] = $password;
            $_SESSION["USER_LOGO"] = $choosedlogo;
        }
    }
    else {
        $USER = RUN_REQ("SELECT * FROM user WHERE ID = '$ID'",$DB)->fetch();
        $OldUser = $USER["USERNAME"];
    }
    
    $template = "settings";
    $title = "Settings";
    
    
    include "../../index.phtml";
}

CLOSE_DB($DB);

?>