<?php

include_once 'header.php';

if($_SESSION["role"] == "admin"){
    echo "hello admin";
}

else{
    if ($_SESSION["role"] == "teacher"){
        echo "hello teacher";
    }
    else {
        echo "hello a TALAB AT3ISS HHH";
    }

}