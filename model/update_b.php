<?php
if(!empty($_POST['send'])){
    unset($action);
    require '..\control\valid_data.php';
    if (empty($_SESSION['erreur'])){
        require 'functions\sql_functions.php';
        
        $exec = UpdateUser($nom, $pren, $email, $site, $pict, $tel ,$ident);
        unset($_SESSION);
    
        header('Location:..\index.php');  
        exit();
    }
}
if(isset($action)){
    require 'functions\sql_functions.php';
    $conn = getConnBd();
    $sql="SELECT * FROM users WHERE id_u = '$ident'";
    $requete = $conn->query("$sql");
    $users = $requete->fetch();
    $nom = $users['nom'];
    $pren = $users['alias'];
    $email = $users['email'];
    $site = $users['sit'];
    $tel = $users['phone'];
    $pict = $users['img'];
}

?>
<link rel="stylesheet" href="..\creation.css">
<fieldset>
    <h1>Page de Modification</h1>
    <form enctype="multipart/form-data" method="post">
        <?php require '..\formulaire.php' ?>
    </form> 
</fieldset>