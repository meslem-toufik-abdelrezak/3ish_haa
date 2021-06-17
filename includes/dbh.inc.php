<?php

$serverName="localhost";//  localhost because I'm using a local DB
$dBUsername="root";
$dBPassword="";//when using xampp empty by defaul
$dBName="loginsystem";//depends on what I call my DB inside phpMyAdmin

/*$conn is var connection using  mysqli_connect() function
Note:
*pdo or mysqli used for OOP php
*mysqli used for procedural php*/
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName); 

if(!$conn) {//it's used to know if there's any sort of errors happening with the connection
    //kill off whatever we're doing here, and spit out a msg
    die("Connection failed: " . mysqli_connect_error());
    //mysqli_connect_error() is a built in php function
}