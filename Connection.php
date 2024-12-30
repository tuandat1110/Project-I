<?php

$host="localhost";
$user="root";
$pass="";
$db="project1";

$con= mysqli_connect($host,$user,$pass,$db);
if($con){
    //do nothing
}
else{
    echo "DB not connected";
}

?>