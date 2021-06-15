<?php

// check if the user access this page the proper way
if(isset($_POST["submit"])){
    $username = $_POST["uid"];//even they may send us email but we name it $username
    $pwd = $_POST["pwd"];//grab the password
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //error handlers
    if(emptyInputLogin($username, $pwd) !== false ){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}

