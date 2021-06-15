<?php

if(isset($_POST["submit"])) { //echo "inside if"; //i used it firstly to check if fuctionality 
    //variables to hold the form inputs to manipulate them
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $userRole=$_POST["role"];



    // error handling
    require_once 'dbh.inc.php';
//functions.inc.php contains bunch of diff fcts that we can reference to inorder to do thgs inside a website
    require_once 'functions.inc.php'; 
    

//FIRST ERROR TO catch if anth empty
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false ){//emptyInputSignup() a defined fct in functions.inc.php
        header("location: ../signup.php?error=emptyinput");//send the user back to signup page
        exit();//stop the script  from running
    }
//SECOND ERROR TO check username validity
    if(invalidUid($username) !== false ){//invalidUid() a defined fct in functions.inc.php
        header("location: ../signup.php?error=invaliduid");//send the user back to signup page
        exit();//stop the script  from running
    }
//THIRD ERROR TO check email validity
    if(invalidEmail($email) !== false ){//invalidEmail() a defined fct in functions.inc.php
        header("location: ../signup.php?error=invalidEmail");//send the user back to signup page
        exit();//stop the script  from running
    }
//FOURTH ERROR TO check Password Matching
    if(pwdMatch($pwd, $pwdRepeat) !== false ){//pwdMatch() a defined fct in functions.inc.php
        header("location: ../signup.php?error=notmatchingpassword");//send the user back to signup page
        exit();//stop the script  from running
    }
//FIFTH ERROR TO PREVENT name repeatition
    if(uidExists($conn, $username, $email) !== false ){//uidExists() a defined fct in functions.inc.php
        header("location: ../signup.php?error=usernametaken");//send the user back to signup page
        exit();//stop the script  from running
    }

//you can add more error handlers if you want eg: password must be >8 chars

//create an account for the user
    createUser($conn, $name, $email, $username, $pwd,$userRole);
}   
else{
    header("location: ../signup.php");//send the user back to signup page
    exit();//stop the script  from running
}
?>