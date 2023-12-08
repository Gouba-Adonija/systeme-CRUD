<?php
function getConnBd(){
    $user='root';
    $server='localhost';
    $mdp='';
    $bd='crud';

    try{
        $conn=new PDO("mysql:host=$server;dbname=$bd",$user, $mdp);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    
    } catch(PDOException $e){
    echo "Erreur de connexio à l base de donnée:".$e -> getmessage();
    }
}

function date_permit($age){
    return (date('Y')-$age."/".(date('d'))."/". date('m')); 
}

function validePass($mdp){
    if( strlen($mdp) > 5 ){
        if(!preg_match("/[!@#$%&*()\[\]{}\-_+=?;:?:]/",$mdp) || !preg_match("/[0-9]/",$mdp) || !preg_match("/[A-Za-z]/",$mdp)){
            return "1";
            exit;
        }
    }else{
        return "2";
        exit;
        
    }
    return true;
}
?>

