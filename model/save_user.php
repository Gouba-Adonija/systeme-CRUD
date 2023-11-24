<?php
require 'model\functions\sql_functions.php';

$move = move_uploaded_file($_FILES['picture']['tmp_name'],"model\images/".$_FILES['picture']['name']);
var_dump($move);
if($move != true) {
    echo 'Nous n\avons pas pu enregistrer l\'image, veuillez reesayer';
    die();
}
$cr = CreateUser($nom,$pren,$email,$tel,$site,$pict);
header('location:..\index.php');