<?php
$action = $_POST['action'];
if(isset($_POST['id'])){
    $id = $_POST['id'];

    if($action == 'Update'){
        $file='user_data.json';
        $datas=file_get_contents($file);
        $datas=json_decode($datas);
        foreach ($datas as $key => $data) {
        if($data->id == "$id"){
    ?>
    <link rel="stylesheet" href="..\creation.css">
    <fieldset>
    <legend><h1>Page de Modification</h1></legend>
    <form enctype="multipart/form-data" method="get" action="update.php">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" style="text-transform:uppercase" maxlength="10" required value="<?=$data->name?>"> 

        <label for="Surname">Prénom</label>
        <input type="text" id="surname" name="surname" style="text-transform:capitalize" value="<?=$data->username?>" required> 

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$data->email?>" required>

        <label for="site">Votre site</label>
        <input type="url" id="site" name="site" value="<?=$data->website?>" required >

        <label for="phone">Télephone</label>
        <input type="number" id="phone" name="tel" maxlength="10" minlength="10" value="<?=$data->phone?>" required> 
     
        <label for="picture">Photo de profil</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="60000" />
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="file" id="picture" name="picture" required selected>
        <?php
        }
    }
        ?>

        <input type="submit" value="Envoyer">
    </form> 
    </fieldset> 
        
    <?php
    
    } elseif($action == 'View'){
        require '..\view.php';
        exit;
    
    } elseif($action == 'Delete'){
        require 'delete.php';
        @include('..\json-index.php');
        exit;
    
    } else{
        die('ERROR : votre action n\'est pas définie');
    }

}elseif(isset($_POST['numero'])){
    $ident = $_POST['numero'];

    if($action == 'Update'){
        require 'functions\sql_functions.php';
        $id = $_POST['numero'];
        $conn = getConnBd();
        $sql="SELECT * FROM users WHERE id_u = '$id'";
        $requete = $conn->query("$sql");
        $users = $requete->fetch();

        ?>
        <link rel="stylesheet" href="..\creation.css">
        <fieldset>
        <legend><h1>Page de Modification sql</h1></legend>
        <form enctype="multipart/form-data" method="get" action="update_b.php">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" style="text-transform:uppercase" maxlength="10" required value="<?=$users['nom']?>"> 

            <label for="Surname">Prénom</label>
            <input type="text" id="surname" name="surname" style="text-transform:capitalize" value="<?=$users['alias']?>" required> 

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?=$users['email']?>" required>

            <label for="site">Votre site</label>
            <input type="url" id="site" name="site" value="<?=$users['sit']?>" required >

            <label for="phone">Télephone</label>
            <input type="number" id="phone" name="tel" maxlength="10" minlength="10" value="<?=$users['phone']?>" required> 

            <label for="picture">Modifier votre photo de profil</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="60000" />
            <input type="hidden" name="id" value="<?=$users['id_u']?>">
            <input type="file" id="picture" name="picture" required>

    
            <input type="submit" value="Envoyer">
        </form> 
    </fieldset>
    <?php




    }elseif($action == 'View'){
        require 'functions\sql_functions.php';
        $user = ReadUser($ident);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Extension</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="images\<?=$user['img'] ?>" alt="photo de profil" width="85px"> </td>
                    <td><?=$user['nom']?></td>
                    <td><?=$user['alias']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['phone']?></td>
                    <td><?=$user['sit']?></td>
                    

                </tr>
            </tbody>
        </table>
        <?php

    }elseif($action == 'Delete'){
        require 'functions\sql_functions.php';
        $tb = DeleteUser($ident);

        if(!$tb == true){
            die('ERROR : votre action n\'est pas définie');
        }
        header('Location:..\index.php');
    }
}