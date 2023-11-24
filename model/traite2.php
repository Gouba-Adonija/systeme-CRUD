<?php
$nom=$_POST['name'];
$pren=$_POST['surname'];
$pass=$_POST['pass'];
require 'functions\functions.php';
$conn = getConnBd();
$sql2="select * from users";

$requete = $conn->query("$sql2");
    if ($requete->rowCount() > 0) {
        while ($user = $requete->fetch()) {
            if($nom == $user["name_u"] && $pren == $user['surname_u'] && $pass == $user['pass_u']){
                die("<center><h1>Bravo</h1></center>");
            }
        }
        echo "Nom/prenom utilisteur ou mot de passe incorrect";
    } else {
        echo "Aucune donnée enregistrée";
    }

?>

