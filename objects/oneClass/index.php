<?php

//use \api\objects\oneClass\Database;
require 'database.php';
    //echo "In";
$database = new Database();

echo $database->connect();
//var_dump($database);


?>