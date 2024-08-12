<?php
include "../../backScript.php";

CHECK_USER_AUTHEN();

$DB = DB_CONNECT("data");
$DB2 = DB_CONNECT("login");
$USER_ID = $_SESSION["USER_ID"];

$content = $_GET["content"];
$id = $_GET["id"];

$checkAccess = RUN_REQ("SELECT * FROM access_type WHERE ID = '$USER_ID' AND ADD_FILM = 1",$DB2)->fetch();

if (!$checkAccess) {
    PRINT_MSG("YOU DON'T HAVE ACCESS TO ADD CONTENT!","Access error");
}
else {
    extract($_POST);
    if ($content == 'serie') {
        // move the local picture to server location, otherwise use the link_logo as a picture
        $choosedpicture = UPLOAD_IMG("image","../../assets/contents/");
        if (!$choosedpicture) {
          $choosedpicture = "https://placehold.it/50x50";
        };
        
        RUN_REQ("INSERT INTO serie(ID,NAME,AUTHOR,DESCRIPTION,IMG,RATING,DATE,TYPE) VALUES('','$serieName','$author','$description','$choosedpicture','$rating','$date','$genre')",$DB)->fetch();
        PRINT_MSG("Action has been achieved Successfuly","add content","success");
    }
    else if ($content == 'season') {
        RUN_REQ("INSERT INTO season(ID,NAME,DATE,EP_NUMBER,DESCRIPTION) VALUES('$id','$seasonName','$date','$epNumber','$description')",$DB)->fetch();
        PRINT_MSG("Action has been achieved Successfuly","add content","success");
    }
    else if ($content == 'episode') {
        RUN_REQ("INSERT INTO episode(ID,NAME,DATE) VALUES('$id','$episodeName','$date')",$DB)->fetch();
        PRINT_MSG("Action has been achieved Successfuly","add content","success");
    }
}

CLOSE_DB($DB,$DB2);

?>