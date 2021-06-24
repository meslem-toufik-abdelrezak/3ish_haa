<!-- add a header -->
<?php 
    include_once 'header.php';
?>

        <section class="signup-form">
            <h2>Sign up</h2>
            <div class="signup-form-form" > <!--vid 23:55 styling patereon :) !!-->
                <form action="includes/signup.inc.php" method="post" >
                    <input type="text" name="name" placeholder="Full name..." >
                    <input type="email" name="email" placeholder="example@email.com" >
                    <input type="text" name="uid" placeholder="User name..." >
                    <input type="password" name="pwd" placeholder="Password..." >
                    <input type="password" name="pwdrepeat" placeholder="Repeat password..." >
                    <input type="text" name="role" placeholder="User role..." >
                    <button type="submit" name="submit" >Sign Up</button>
                </form>
            </div><!--end styling patereon :) !!--> 
            <!--vid 23:08 we will need to add some error messages -->
<!-- at vid 1h29mn -->
<?php
    if(isset($_GET["error"])){ //check if some url exists inside url
        if($_GET["error"] == "emptyinput"){
            echo "<p class = 'error-p' >Fill in all fields!</p>";
        }
        else if ($_GET["error"]== "invaliduid"){
            echo "<p class = 'error-p'>Choose a proper username!</p>";
        }
        else if ($_GET["error"]== "invalidEmail"){
            echo "<p class = 'error-p'>Choose a proper email!</p>";
        }
        else if ($_GET["error"]== "notmatchingpassword"){
            echo "<p class = 'error-p'>Password does not match!</p>";
        }
        else if ($_GET["error"]== "stmtfailed"){
            echo "<p class = 'error-p'>Something went wrong, try again!</p>";
        }
        else if ($_GET["error"]== "usernametaken"){
            echo "<p class = 'error-p'>Username already taken!</p>";
        }
        else if ($_GET["error"]== "none"){
            echo "<p class = 'error-p'>You have signed up!</p>";
        }
     }
?>          
        </section>



<!-- add a footer -->
<?php 
    include_once 'footer.php';
?>