<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "rentcar_company";

$mysqli = new mysqli($host, $user, $password, $database);
if (mysqli_connect_errno()) 
{
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
}