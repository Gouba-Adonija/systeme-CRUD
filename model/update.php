<?php
$file='user_data.json';

if(!empty($_POST['name'])){
    require '..\control\valid_data.php';

    if (empty($_SESSION['erreur'])){
        $op = json_decode(file_get_contents($file));
        foreach ($op as $key => $value) {
            if($id == $value-> id){
                if($value->name != $nom){
                    $value->name = $nom;
                }
                if($value->username != $pren){
                    $value->username = $pren;
                }
                if($value->email != $email){
                    $value->email = $email;
                }
                if($value->phone != $tel){
                    $value->phone = $tel;
                }
                if($value->website != $site){
                    $value->website = $site;
                }
                if($value->extension != $pict){
                    $value->extension = $pict;
                }
            }
        }
        
        $new_datas = $op;
        
        $encod=json_encode($new_datas,JSON_PRETTY_PRINT);
        $op=file_put_contents($file,$encod);
        unset($_SESSION);
        if(!$op){
            echo '<center style="color:red"> <h1>Modification non éfffectuée </h1></center>';
            exit;
        }
        header('Location:..\index.php');
    }else{
        unset($action);
    }
}
if(isset($action)){
    $datas=file_get_contents($file);
    $datas=json_decode($datas);
    foreach ($datas as $key => $data) {
        if($data->id == "$id"){
            $nom = $data->name;
            $pren = $data->username;
            $email = $data->email;
            $site = $data->website;
            $tel = $data->phone;
            if(isset($data->extension)){
                $pict = $data->extension;   
            }
        }
    }

}

?>
<link rel="stylesheet" href="..\creation.css">
<fieldset>
    <h1>Page de Modification</h1>
    <form enctype="multipart/form-data" method="post" action="">
        <?php require '..\formulaire.php'  ?>
    </form>
</fieldset>
<?php    