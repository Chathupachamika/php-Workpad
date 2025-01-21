<?php

$con = new mysqli('localhost','root','1234','crudoperation');

if($con){
    echo "Connection succesfull";
}else{
    die(mysqli_error($con));
}

