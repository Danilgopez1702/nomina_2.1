<?php

// Connection variables 
$host = "mocha3035.mochahost.com"; // MySQL host name eg. localhost
$user = "inventar_1"; // MySQL user. eg. root ( if your on localserver)
$password = "12345"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "inventar_nomina"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>