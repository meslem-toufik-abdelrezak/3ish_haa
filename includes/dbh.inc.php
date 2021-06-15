<?php

$serverName="localhost";//  localhost because I'm using a local DB
$dBUsername="root";
$dBPassword="";//when using xampp empty by defaul
$dBName="loginsystem";//depends on what I call my DB inside phpMyAdmin

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName); //var connection --> pdo or mysqli used for OOP php --> mysqli used for procedural php

if(!$conn) {// used to let us know if there's any sort of errors happening with the connection
    die("Connection failed: " . mysqli_connect_error());//kill off whatever we're doing here, and spit out a msg
}