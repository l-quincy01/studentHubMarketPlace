<?php
session_start();

if(!isset($_SESSION['access']))
{

    header("Location:landing.php");

}


?>