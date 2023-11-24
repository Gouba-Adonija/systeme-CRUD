<?php
require 'user.class.php';
$id = $_GET['id'];
$nom = $_GET['name'];
$prenom = $_GET['surname'];
$email = $_GET['email'];
$site = $_GET['site'];
$tel = $_GET['tel'];
$ext = $_GET['picture'];

$file = 'user_data.json';
$op = json_decode(file_get_contents($file));
foreach ($op as $key => $value) {
    if($id == $value-> id){
        if($value->name != $nom){
            $value->name = $nom;
        }
        if($value->username != $prenom){
            $value->username = $prenom;
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
        if($value->extension != $ext){
            $value->extension = $ext;
        }
    }
}

$new_datas = $op;

$encod=json_encode($new_datas,JSON_PRETTY_PRINT);
$op=file_put_contents($file,$encod);
if(!$op){
    echo '<center style="color:green"> <h1>Modification non éfffectuée </h1></center>';
}
header('Location:..\index.php');
?>