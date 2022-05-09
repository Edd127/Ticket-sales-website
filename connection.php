<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "site_web_design";
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (!$con) {
    die("Eroare la conectare");
}
