<?php
session_start();

//do katerih strani ima neprijavljen uporabnik dostop
$allow = ['/crypto/login.php', '/crypto/register.php', '/crypto/index.php', '/crypto/login_check.php'];

//preverim ali je user prijavljen
if (!isset($_SESSION['user_id']) && (!in_array($_SERVER['REQUEST_URI'], $allow)))
    {

    header("Location: login.php");
    die();
    }

    
?>