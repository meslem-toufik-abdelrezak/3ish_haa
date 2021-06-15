<?php

//destroy session variable inside our current session = delete them

session_start();
session_unset();
session_destroy();

//send user back to the front page
header("location: ../index.php");
exit();