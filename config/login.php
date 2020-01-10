<?php
ob_start();
session_start();
$timezone = date_default_timezone_get("Africa/kampala");
$con = mysqli_connect("localhost","root","","dsa");
if(mysqli_connect_errno()){
    echo "failed to connect". mysqli_connect_errno();
}else{
    echo "sucess";
}


?>