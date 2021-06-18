<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;//created outside if to avoid rewriting inside each if
    //empty() built in function
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
    //if one is true, it means empty . or more than one
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;//created outside if to avoid rewriting inside each if
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        /*  /^[a-zA-Z0-9]*$/ is the searching algorithm */
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;//created outside if to avoid rewriting inside each if
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;//created outside if to avoid rewriting inside each if
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//the most complicated function
function uidExists($conn, $username, $email) {
    //we need to connect to db if username that was submitted is already inside the db table that we created
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEamil = ?"; //? is a placeholder
    //we start with prepared statemnt because we need to submit sql stmt in the proper way
    $stmt = mysqli_stmt_init($conn);//vid 1:10:00 after this time or just before
    //we used that to prevent any sort of code to get injected into DB
    if(!mysqli_stmt_prepare($stmt, $sql)){//check any sort of mistakes that might happen here
            header("location: ../signup.php?error=stmtfailed");//send the user to signup page with an error msg
            exit();
    }
    //if this is not failed we start passing the data from the user
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    //grab the data
    $resultData = mysqli_stmt_get_result($stmt);

    //check if there is a result from this particular statement
    if($row = mysqli_fetch_assoc($resultData)){ // at 1:18:00 ads $row = , before لم تكن كذلك
            // write at vid 1:15:00 empty to fill it later at vid 
            // bcoz we want to give it an alternative purpose 1h17mn, need it in login form
            return $row;
    }
    else{
        $result = false ;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd,$role) {

    //we need to connect to db if username that was submitted is already inside the db table that we created
    $sql = "INSERT INTO users (usersName, usersEamil, usersUid, usersPwd,privilege) VALUES (?, ?, ?, ?,?);"; //? is a placeholder
    //we start with prepared statemnt because we need to submit sql stmt in the proper way
    $stmt = mysqli_stmt_init($conn);//vid 1h21mn
    //we used that to prevent any sort of code to get injected into DB
    if(!mysqli_stmt_prepare($stmt, $sql)){//check any sort of mistakes that might happen here
            header("location: ../signup.php?error=createfailed");//send the user to signup page with an error msg
            exit();
    }

    //hashing password with the automatically updated func password_hash()
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    //if this is not failed we start passing the data from the user
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd,$role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    /*SEND the user back to the front page or sth once they signed up successfully
    in the tutorial he sent him to the signup page again*/
    header("location: ../signup.php?error=none");//send the user to signup page with an error msg
    exit();

}

//login functions
function emptyInputLogin($username, $pwd) {
    $result;
    if(empty($username) || empty($pwd)){
        //if one is true, it means empty . or more than one
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);//inside uidExists() we are asking either username or email so it fills third param auto in email 

    //error handler 
    if( $uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    //password matching 
    $pwdHashed =  $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        //Dani: login the user into the website , we start talking about sessions
        session_start();
        // session global variables 
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["role"] = $uidExists["privilege"];

        // send the user to profile page
        header("location: ../profile.php");
        exit();
    }
}
