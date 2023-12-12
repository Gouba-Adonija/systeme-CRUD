<?php
require 'functions.php';
function GetAllUser(){
    $conn = getConnBd();
    $conn->beginTransaction();
    $sql="select * from users";
    $requete = $conn->query("$sql");
    if ($requete->rowCount() > 0) {
        $user = $requete->fetchAll();
    } else {
        return false;
    }
    $conn->commit();
    return $user;
}

function CreateUser($nom,$pren,$email,$tel,$site,$pict){
    try{
        $conn = getConnBd();
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO users(nom, alias, email, phone, sit, img) 
        VALUES (:nom, :pren, :email, :tel, :sit, :img)");
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':pren',$pren);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':tel',$tel);
        $stmt->bindParam(':sit',$site);
        $stmt->bindParam(':img',$pict);
        
        $test = $stmt->execute();
        //fonction de vérifiction de la requete
        // $stmt->debugDumpParams();
        $conn->commit();
        $conn=null;
        $stmt=null;
    
    } catch(PDOException $e){
        $conn->rollBack();
        $errorinfo=$stmt->errorinfo();
        echo "Erreur lors de l'enregistrement".$errorinfo[2];
        exit;
    
    }
}

function ReadUser($id){
    $conn = getConnBd();
    $conn->beginTransaction();
    $sql="SELECT * FROM users WHERE id_u = '$id'";
    $stmt = $conn->query("$sql");
    $conn->commit();
    $result = $stmt -> fetchAll();
    if(empty($result)){
        return false;
    }
    return $result[0];
}

function UpdateUser($nom, $pren, $email, $site, $pict, $tel ,$id){
    try{
        $conn = getConnBd();
        $conn->beginTransaction();
        $sql="UPDATE users SET nom = :nom, alias = :alias, email = :email, phone = :phone, sit = :sit, img = :img WHERE id_u = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':alias',$pren);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':phone',$tel);
        $stmt->bindParam(':sit',$site);
        $stmt->bindParam(':img',$pict);
        $stmt->bindParam(':id',$id);
        $test = $stmt->execute();
        $conn->commit();
        
        return true;
    }catch(PDOException $e){
        return $conn->rollBack();
    } 
}


function DeleteUser($id){
    try{
        $conn = getConnBd();
        $conn->beginTransaction();
        $sql="DELETE FROM `users` WHERE id_u=$id";
        $stmt = $conn->query("$sql");
        
        $conn->commit();

        return true;
    }catch( PDOException $e){
        return $conn->rollBack();
    }
    
}
