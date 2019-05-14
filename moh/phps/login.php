<?php

$username=$_GET["username"];
$password=$_GET["password"];
$mode=$_GET["mode"];
if ($mode=="login")
{
    $_SESSION['username']=$_GET["username"];
    $_SESSION['logged']='yes';
    echo "loggedin";
}
if ($mode=="logout")
{
    $_SESSION['username']="";
    $_SESSION['logged']='no';
    echo "loggedout";
}
?>