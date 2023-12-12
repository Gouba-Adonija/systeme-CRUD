<?php
session_start();
if(session_status() != 'PHP_SESSION_DISABLED'){
    unset($_SESSION['id']);
}
if(isset($_POST['action'])){
    $_SESSION['action'] = $_POST['action'];
    if(isset($_POST['id'])){
        $_SESSION['id'] = $_POST['id'];
        
    }else{
        $_SESSION['numero'] = $_POST['numero'];
    }
}

if(isset($_SESSION['id'])){
    
    $id = $_SESSION['id'];
    $action = $_SESSION['action'];

    if($action == 'Modifier'){
        require 'update.php';
    }elseif($action == 'Voir'){
        require '..\view.php';
        exit;
    
    } elseif($action == 'Supprimer'){
        require 'delete.php';
        exit;
    
    }

}elseif(isset($_SESSION['numero'])){
    $ident = $_SESSION['numero'];
    $action = $_SESSION['action'];

    if($action == 'Modifier'){
        require 'update_b.php';
    }elseif($action == 'Voir'){
        require 'functions\sql_functions.php';
        $user = ReadUser($ident);

        ?>
        <style>
            .container{
                display: flex;
                background-color: rgba(13,100,45,0.5);
                padding: 20px;
            }
            .left{
                margin-right: 10%;
            }
            #nom{
                font-size: 60px;
                margin: 0;
            }
            p{
                font-size: 20px;
            }
            .right{
                display: flex;
                padding: 10px;
            }
            img{
                box-shadow: 1px 1px 1px solid black
            }
            .two{
                margin-left: 100px;
            }
            a{
                text-decoration: none;
            }
        </style>
        <div class="container">
            <div class="left">
                <img src="images\<?=$user['img'] ?>" alt="photo de profil" width="200px">
            </div>
            <div class="right">
                <div class="one">
                    <p id="nom"><strong><?=$user['nom']?></strong></p>
                    <p><strong><?=$user['alias']?></strong></p>
                    <p><?=$user['email']?></p>
                </div>
                <div class="two">
                    <p><a href="tel:<?=$user['phone']?>"><?=$user['phone']?></a> </p>
                    <p> <a href=""><?=$user['sit']?></a></p>    
                </div>
            </div>
        </div>
        <?php
        exit;

    }elseif($action == 'Supprimer'){
        require 'functions\sql_functions.php';
        $tb = DeleteUser($ident);
        
        if(!($tb == true)){
            die('ERROR : votre action n\'est pas définie');
        }
        header('Location:..\index.php');
    }
}else{
    echo 'ERREUR: veuillez redefnir votre action';
}