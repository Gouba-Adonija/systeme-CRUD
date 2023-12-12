<?php
$file='user_data.json';
$datas=file_get_contents($file);
$datas=json_decode($datas);
foreach($datas as $key => $data){
    if($data -> id == $id){
        unset($datas[$key]);
    }
}
$new_datas=[];
foreach ($datas as $key => $class) {
    $new_datas[]= $class;
}

$encod=json_encode($new_datas,JSON_PRETTY_PRINT);
$op=file_put_contents($file,$encod);
if(!$op){
    die('<center style="color:red"> <h1>Supression non éfffectuée </h1></center>');
}
header('location:..\index.php')
?>