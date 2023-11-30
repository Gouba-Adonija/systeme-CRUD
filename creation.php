<?php
var_dump($_POST);
if(!empty($_POST)){
    $nom=strtoupper($_POST['name']);
    $pren=ucfirst($_POST['surname']);
    $email=$_POST['email'];
    $tel=strval($_POST['tel']);
    $site=$_POST['site'];
    
    if(empty($nom) || empty($pren) || empty($email) || empty($tel) || empty($site) || empty($_FILES['picture']['name'])){
        $erreur = "<p style = color:red>Veuillez remplir tout les champs</p>  ";
    }
    if(empty($_FILES)){
        $erreur = "selectionner une image";
    }
    
    if(strlen($nom) >= 10){
        $erreur =  "<p style = color:red>Votre nom ne doit pas dépasser les 10 caractères (max = 10 )</p>";
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erreur =  "<p style = color:red>Veuillez rentrez une adresse email valide !</p>";
    }
    
    if(is_numeric($tel)){
        if(strlen($tel) != 10){
            $erreur = "<p style = color:red>Veuillez respecter le nombre de chiffres (10)</p>";
        }
    }else{
        $erreur = "<p style = color:red>Erreur : le format du numéro de téléphone est invalide</p>";
    }
    
    $pict = $_FILES['picture']['name'];
    $extens = strtolower(substr($pict, -3));
    $extensions = ['jpg','png', 'jpeg'];
    if(!in_array($extens, $extensions)){
        $erreur = 'Votre fichier n\'est pas une image';
    }
    if($_FILES['picture']['tmp_name'] == ""){
        $erreur = 'Chemin vers l\'image non défini, choisir une autre image';
    }
    if(isset($erreur)){
        echo $erreur;

    }else{
        require 'model\save_user.php';
    }
}


require 'model\functions\functions.php';
    $restrict = date_permit(18);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="creation.css">
    <title>Page d'inscription</title>
</head>
<body>
    
    
    <div class="contain">
    <fieldset>
        <legend><h1>Page de création</h1></legend>
        <form enctype="multipart/form-data" method="post" action="creation.php">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" style="text-transform:uppercase" maxlength="10" value="<?php 
                 if( !empty($_POST['name'])){
                    echo $_POST['name'];
                }
            ?>"required>

            <label for="Surname">Prénom</label>
            <input type="text" id="surname" name="surname" style="text-transform:capitalize" value="
            <?php
                if( !empty($_POST['surname'])){
                    echo $_POST['surname'];
                }
            ?>
            "required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="
            <?php
                if( !empty($_POST['email'])){
                    echo $_POST['email'];
                }
            ?>
            " required>
            
            <label for="site">Votre site</label>
            <input type="url" id="site" name="site" value="
            <?php
                if( !empty($_POST['site'])){
                    echo $_POST['site'];
                }
            ?>
            "required >
            
            <label for="phone">Télephone</label>
            <input type="number" id="phone" name="tel" maxlength="10" minlength="10" value="
            <?php
                if(!empty($_POST['tel'])){
                    echo '0'.$_POST['tel'];
                }
            ?>
            "required>
            <div class="error">
  
            <label for="picture">Rajouter une photo de profil</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="60000" />
            <input type="file" id="picture" name="picture" required>
            <div class="error">
            
            <input type="submit" name='send' value="Envoyer">
        </form> 
    </fieldset>
    </div>
</body>
</html>