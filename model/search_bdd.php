<?php
$conn = getConnBd();
$conn->query("SET NAMES UTF8");

if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){
    $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
    $terme = $_GET['terme'];
    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête

 if (isset($terme)){
    $terme = strtolower($terme);
    $select_terme = $conn->prepare("SELECT users FROM articles WHERE name_u LIKE :bdr OR surname_u LIKE :bdr OR email_u LIKE :bdr site_u LIKE :bdr phone_u LIKE :bdr");
    $conn->bindParam(':nom',$terme);

 }else{
    $message = "Vous devez entrer votre requete dans la barre de recherche";

 }
 header('Location:..\index.php');
}
?>