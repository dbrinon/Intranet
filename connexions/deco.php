<?php
session_start(); if(empty($_SESSION['login'])){ header('location:./'); }
session_unset();
session_destroy();
header('location:http://127.0.0.1/test/index.php');
?>