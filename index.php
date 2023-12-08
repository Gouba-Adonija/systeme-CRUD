<?php
require 'model\functions\sql_functions.php';
$file='model\user_data.json';
$datas=file_get_contents($file);
$datas=json_decode($datas);
?>

<link rel="stylesheet" href="index.css">
<a href="creation.php">Create new user</a>
<table>
    <thead>
        <tr>
            <th>Extension</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($datas as $data){
            if(isset($data -> extension)){
                $src="model\images\\".$data -> extension;
                echo  "<td> <img src='$src' alt='photo de profil' width=60px></td>";
            }else{
                echo  "<td></td>";
            }
            ?>
            <td><?=$data -> name?></td>
            <td><?=$data -> username?></td>
            <td><?=$data -> email?></td>
            <td><?=$data -> phone?></td>
            <td class='web'><a href="<?=$data -> website?>"><?=$data -> website?></a></td>
            <td>
                <form action="model\action_json.php" method="post" >
                    <input type="submit" name="action" value="Voir">
                    <input type="submit" name="action" value="Modifier">
                    <input type="submit" name="action" value="Supprimer">
                    <input type="hidden" name="id" value="<?=$data -> id?>">    
                </form>
            </td>   
        </tr>
            <?php  
            } 
        $utilisateurs = GetAllUser();
        if(!empty($utilisateurs)){
            foreach ($utilisateurs as $key => $utilisateur){
            $extension = $utilisateur['img'];
            $nom = $utilisateur['nom'];
            $prenom = $utilisateur['alias'];
            $email = $utilisateur['email'];
            $phone = $utilisateur['phone'];
            $site = $utilisateur['sit'];
            $ident = $utilisateur['id_u'];

            
    ?>
    <tr>
        <td><img src="model\images\<?=$extension?>" alt='photo de profil' width=60px></td>
        <td><?=$nom?></td>
        <td><?=$prenom?></td>
        <td><?=$email ?></td>
        <td><?=$phone ?></td>
        <td class="web"><a href="<?=$site ?>"><?=$site ?></a></td>
        <td>
            <form action="model\action_json.php" method="post" >
                <input type="submit" name="action" value="Voir">
                <input type="submit" name="action" value="Modifier">
                <input type="submit" name="action" value="Supprimer">
                <input type="hidden" name="numero" value="<?=$ident ?>">
            </form>
        </td>
        
    </tr>
    <?php
            }     
        }
?>

                
    </tbody>     
</table>