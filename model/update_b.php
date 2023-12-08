<?php
if(!empty($_POST['name'])){
    unset($action);
    require '..\control\valid_data.php';
    if (empty($_SESSION['erreur'])){
        require 'functions\sql_functions.php';
        $new_user=[
            'nom' => $nom,
            'alias' => $pren,
            'email' => $email,
            'phone' => $tel,
            'sit' => $site,
            'img' => $pict
        ];
        UpdateUser($nom, $pren, $email, $site,$tel ,$ident);
        var_dump($new_user);
        unset($_SESSION);
        
        header('Location:..\index.php');  
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
    <form enctype="multipart/form-data" method="post" action="">
        <?php require '..\formulaire.php' ?>
    </form> 
</fieldset>