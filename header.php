<?php
session_start(); //when the user is loged in, will b login in all pages
?>

<!DOCTYPE html>
<html lang="eng" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>homepage</title>
        <!-- the 2 links below to 2 css files that i have to subscribe on patereron or get from 
        another source -->
        <link rel="stylesheet" href="css/reset.css" >  <!--reset the styling in all diff browsers -->
        <link rel="stylesheet" href="css/style.css">  <!--styles the website c css course -->        
    </head>
    <body>
                
        <nav>
            <div class="wrapper"> <!-- to wrapp evthg inside the header-->
            <!-- change the logo -->
                <!-- <a href="index.php"><img src="img\homePageIcon.png" alt="Blogs logs" width="50"></a> -->
                <ul> <!-- basic menu-->
                    <li><a href="index.php">Home</a></li>
                    <!-- two important things -->
                    <?php
                        if(isset($_SESSION["useruid"])){
                            echo '<li><a href="profile.php">Profile</a></li>';
                            echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="signup.php">Sign Up</a></li>';
                            echo '<li><a href="login.php">Login</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>
        
        <div class="wrapper"> <!--contains the main content of the page-->
        <!-- first section is an introduction -->