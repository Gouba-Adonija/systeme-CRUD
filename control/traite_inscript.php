<?php
$nom=strtoupper($_POST['name']);
$pren=ucfirst($_POST['surname']);
$email=$_POST['email'];
$tel=$_POST['tel'];
$site=$_POST['site'];

if(empty(($nom)) || empty($pren) || empty($email) || empty($tel) || empty($site)){
    $erreur = "<p style = color:red>Veuillez remplir tout les champs</p>  ";
    exit;
}
if(empty($_FILES)){
    $erreur = "selectionner une image";
    exit;
}

if(strlen($nom) >= 10){
    $erreur =  "<p style = color:red>Votre nom ne doit pas dépasser les 10 caractères (max = 10 )</p>";
    exit;   
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erreur =  "<p style = color:red>Veuillez rentrez une adresse email valide !</p>";
    exit;
}

if(is_numeric($tel)){
    if(strlen($tel) != 10){
        $erreur = "<p style = color:red>Veuillez respecter le nombre de chiffres (10)</p>";
        exit;
    }
}else{
    $erreur = "<p style = color:red>Erreur : le format du numéro de téléphone est invalide</p>";
    exit;
}

$pict = $_FILES['picture']['name'];
$extens = strtolower(substr($pict, -3));
$extensions = ['jpg','png', 'jpeg'];
if(!in_array($extens, $extensions)){
    $erreur = 'Votre fichier n\'est pas une image';
    exit;
}
if($_FILES['picture']['tmp_name'] == ""){
    $erreur = 'Chemin vers l\'image non défini, choisir une autre image';
}
?>