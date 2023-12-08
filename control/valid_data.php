<?php
if(session_status() == 'PHP_SESSION_DISABLED'){
    session_start();
}
$obt = 0;
$_SESSION['erreur'] = [];
if(!empty($_GET)){
    $obt = 1;
    $nom=strip_tags(htmlspecialchars(strtoupper($_GET['name'])));
    $pren=strip_tags(htmlspecialchars(ucfirst($_GET['surname'])));
    $email=strip_tags(htmlspecialchars($_GET['email']));
    $tel=strip_tags(htmlspecialchars(strval($_GET['tel'])));
    $site=strip_tags(htmlspecialchars($_GET['site']));
    if(isset($_GET['id'])){
        $id=strip_tags(htmlspecialchars($_GET['site']));
    }
}elseif(!empty($_POST)){
    $obt = 1;
    $nom=strip_tags(htmlspecialchars(strtoupper($_POST['name'])));
    $pren=strip_tags(htmlspecialchars(ucfirst($_POST['surname'])));
    $email=strip_tags(htmlspecialchars($_POST['email']));
    $tel=strip_tags(htmlspecialchars(strval($_POST['tel'])));
    $site=strip_tags(htmlspecialchars($_POST['site']));
    if(isset($_POST['id'])){
        $id=strip_tags(htmlspecialchars($_POST['site']));
    }
}
    
if($obt == 1){
    if(empty($nom)){
        $_SESSION['erreur'][1] = "Veuillez remplir le champs nom";
    }else{
        if(strlen($nom) >= 10){
            $_SESSION['erreur'][1] =  "Votre nom ne doit pas dépasser les 10 caractères (max = 10 )";
        }    
    }
    
    if(empty($pren)){
        $_SESSION['erreur'][2] = "Veuillez remplir le champs prenom ";
    }
    
    if(empty($email)){
        $_SESSION['erreur'][3] = "Veuillez remplir le champs email ";
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['erreur'][3] =  "Veuillez rentrez une adresse email valide !";
        }
    }
    
    if(!empty($tel)){
        if(is_numeric($tel)){
            if(strlen($tel) != 10){
                $_SESSION['erreur'][5] = "Veuillez respecter le nombre de chiffres (10)";
            }
        }else{
            $_SESSION['erreur'][5] = "Le format du numéro de téléphone est invalide";
        }
    }else{
        $_SESSION['erreur'][5] = "Veuillez remplir le champs numero de telephone ";
    }
    
    
    if(empty($site)){
        $_SESSION['erreur'][4] = "Veuillez remplir le champs site ";
    }else{
        if (filter_var($site, FILTER_VALIDATE_URL) === false) {
            $_SESSION['erreur'][4] = "URL est invalide";
          }
    }
    
    if(isset($_FILES)){
        if(empty($_FILES)){
            $_SESSION['erreur'][6] = "Veuillez selectionner une image ";
    
        }elseif(!empty($_FILES)) {
            $pict = $_FILES['picture']['name'];
            $extens = strtolower(substr($pict, -3));
            $extensions = ['jpg','png', 'jpeg'];
            if(!in_array($extens, $extensions)){
                $_SESSION['erreur'][6]= 'Votre fichier n\'est pas une image';
                exit;
            }
            if ($_FILES['picture']['tmp_name'] == ""){
                $_SESSION['erreur'][6]= 'Chemin vers l\'image non trouvé, choisir une autre image';
            }
       } 
    }else{
        $pict=strip_tags(htmlspecialchars($_GET['site']));
    }
}