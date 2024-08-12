<?php
include "../../backScript.php";

$template = "authentication";
$title = "LOGIN";

$DB = DB_CONNECT("login");

$visitorMode = 0;
if (!empty($_GET)) {$visitorMode = $_GET["visitor"];}

if ($visitorMode) {
    $VISITOR = RUN_REQ("SELECT * from user WHERE ID = 19000",$DB)->fetch();

    session_start();
    $_SESSION["USER_ID"] = $VISITOR["ID"];
    $_SESSION["USER_USERNAME"] = $VISITOR["USERNAME"];
    $_SESSION["USER_PASSWORD"] = $VISITOR;
    $_SESSION["USER_LOGO"] = $VISITOR["LOGO"];

    $ID = $VISITOR["ID"];
    // update the access history
    RUN_REQ("INSERT INTO access_history (ID,DATE_ACCESS) VALUES ('$ID',CURRENT_TIMESTAMP)",$DB)->fetch();
    // move to main page
    header('Location: ./menu.php');
}
else {
    if (!empty($_POST)) {
        
        // GET VARIABLES
        extract($_POST);
        $USER = checkAuthentication($user,$DB);
        // Authentication
        if ($USER && password_verify($password,$USER['PASSWORD'])) {
            // create a cookies
            session_start();
            $_SESSION["USER_ID"] = $USER["ID"];
            $_SESSION["USER_USERNAME"] = $USER["USERNAME"];
            $_SESSION["USER_PASSWORD"] = $password;
            $_SESSION["USER_LOGO"] = $USER["LOGO"];
    
            $ID = $USER["ID"];
            // update the access history
            RUN_REQ("INSERT INTO access_history (ID,DATE_ACCESS) VALUES ('$ID',CURRENT_TIMESTAMP)",$DB)->fetch();
            // move to main page
            header('Location: ./menu.php');
        }
        else {
            session_start();
            session_destroy();
            PRINT_MSG("<h4>Authentification Error,Please try to Re-login</h4>
            <a href='authentication.php' class='link-secondary'><button class='btn btn-primary btn-lg'>LOGIN PAGE</button></a>",
            "Authentification error","danger");
            exit();
        }
    }
}

CLOSE_DB($DB);

include "../../index.phtml";

?>