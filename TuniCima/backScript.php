<?php

function DB_CONNECT($DB=NULL,$HOST="localhost",$USER="root",$PASS=NULL) {
    try {
        $DB = new PDO("mysql:host=$HOST;dbname=$DB;charset=utf8",$USER,$PASS);
        // SET THE ERROR HANDLING MODE
        $DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
        // SET THE FETCH MODE
        //$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $DB;
    }
    catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
// THIS FUNCTION IS ABLE TO CLOSE UP TO 8 DATABASES SIMULTANEOUSLY
function CLOSE_DB($DB,$DB2=null,$DB3=null,$DB4=null,$DB5=null,$DB6=null,$DB7=null,$DB8=null) {
    $DB=null;$DB2=null;$DB3=null;$DB4=null;$DB5=null;$DB6=null;$DB7=null;$DB8=null;
}

// FUNCTION USED TO RUN REQUESTS
function RUN_REQ($REQ,$DB) {
    $REQ = $DB->prepare($REQ);
    $REQ->execute();
    return $REQ;
}

function UPLOAD_IMG($IMG,$path) {
    $result = null;
    $target = $path.basename($_FILES[$IMG]["name"]);

    if (move_uploaded_file($_FILES[$IMG]["tmp_name"],$target)) {
                echo "<div class='alert alert-success' role='alert'>FILE UPLOADED</div>";
                $result = $target;
    };
    return $target;
}

// FUNCTION USED TO VERIFY USER AUTHENTIFICATION
function CHECK_USER_AUTHEN() {
    session_start();
    if (!isset($_SESSION["USER_ID"])) {
        PRINT_MSG("<h4>Session Expired,Please try to Re-login</h4>
        <a href='authentication.php' class='link-secondary'><button class='btn btn-primary btn-lg'>LOGIN PAGE</button></a>",
        "Expired Session","secondary");
        exit();
    }
}

function PRINT_MSG($code,$title="message",$type="warning") {
    $src_code = $code;
    $alert_title = $title;
    $alert_type = $type;
    include "./message.phtml";
}

function checkAuthentication($USER,$DB) {
    $R = RUN_REQ("SELECT * FROM user WHERE USERNAME = '$USER'",$DB);
    return $R->fetch();
}

?>