<?php
require 'functions\sql_functions.php';
$n = $_GET['name'];
$p = $_GET['surname'];
$e = $_GET['email'];
$s = $_GET['site'];
$t = $_GET['tel'];
$i = $_GET['id'];
$ext = $_GET['picture'];

DeleteUser($i);
CreateUser($n,$p,$e,$t,$s,$ext);

header('Location:..\index.php');
?>