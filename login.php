<!-- add a header -->
<?php 
    include_once 'header.php';
?>

        <section class="signup-form">
            <h2>Login</h2>
            <div class="signup-form-form" > <!--vid 26:00 didn't change class -->
                <form action="includes/login.inc.php" method="post" >
                    <input type="text" name="uid" placeholder="Username or Email" >
                    <input type="password" name="pwd" placeholder="Password..." >
                    <button type="submit" name="submit" >Login</button>
                </form>
            </div><!--end styling paterkkeon :) !!-->   
            <?php
            if(isset($_GET["error"])){ //check if some url exists inside url
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"]== "wronglogin"){
                    echo "<p>Incorrect login information!</p>";
                }
            }
            ?>         
        </section>



<!-- add a footer -->
<?php 
    include_once 'footer.php';
?>