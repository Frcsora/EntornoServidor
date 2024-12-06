<?php
function conectarBBDD($charset = "utf8mb4" ,$tipo = "mysql", $port = 3307, $host = "localhost", $user = "root", $pass = "", $db = "DWES") {
    try{
        $PDO = new PDO("$tipo:host=$host:$port;dbname=$db;charset=$charset", $user, $pass);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;
    }catch(PDOException $e){
        echo $e->getMessage();

    }
    return null;
}
function getUserByName($PDO, $name){
    try{
        $stmt = $PDO->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
        $stmt->bindParam(':nombre',$name,PDO::PARAM_STR);
        $stmt->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
function insertarUsuario($PDO, $name, $surname1, $surname2, $nickname, $password){
    try{
        $alta = "alta";
        $stmt = $PDO->prepare("INSERT INTO usuarios(nombre, apellido1, apellido2, username, pass, status)
        VALUES (:nombre, :apellido1, :apellido2, :username, :pass, :status)");
        $stmt->bindParam(':nombre',$name);
        $stmt->bindParam(':apellido1',$surname1);
        $stmt->bindParam(':apellido2',$surname2);
        $stmt->bindParam(':username',$nickname);
        $stmt->bindParam(':pass',$password);
        $stmt->bindParam(':status',$alta);
        $stmt->execute();

    }catch(Exception $e){
        echo $e->getMessage();
    }
}
