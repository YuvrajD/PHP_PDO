<?php

define("DB_NAME","pdo_app");
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");


try{
//$connection =new PDO('mysql:host=.DB_HOST.;dbname=.DB_NAME.','root','');
$connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo $e->getMessage();

$date = date('d.m.Y h:i:s'); 
$log = "Date:".$date."|"."Error:".$e;
error_log("$log\n", 3, "error_log.log");
}
