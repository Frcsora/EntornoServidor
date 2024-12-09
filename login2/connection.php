<?php
if(str_contains($_SERVER["PHP_SELF"], "connection.php")){
    header("location:logout.php");
    exit;
}

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
function getUserByName($PDO,$username){
    //Mi idea con esta funcion es tomar la id del usuario, y asi poder utilizarlo para hallar el resto de información del usuario cuando me hace falta
    try{
        $stmt = $PDO->prepare("SELECT id FROM usuarios WHERE username = :username;");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id["id"];
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return null;
}
function getIfUserExists($PDO,$username){
    //Se utiliza para saber si ya hay un usuario creado con el mismo username antes de hacer el insert y para asegurarse de que existe antes de comprobar la contraseña en el login
    try{
        $stmt = $PDO->prepare("SELECT 1 FROM usuarios WHERE EXISTS(SELECT * FROM usuarios WHERE username = :username);");
        //Esta query la vimos el año pasado en bases de datos y he ido a mirar apuntes del año pasado por que me parecia interesante poder usarlo
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if($stmt->fetch()){
            return true;
        }else{
            return false;
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return false;
}
function getUserFromID($PDO,$id){
    //Obtiene el nombre de usuario
    try{
        $stmt = $PDO->prepare("SELECT username FROM usuarios WHERE id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user["username"];
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return null;
}
function darseDeAlta($PDO, $id){
    //Update a status para volver a poner de alta
    try{
        $stmt = $PDO->prepare("UPDATE usuarios SET status = 'alta' WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }

}
function darseDeBaja($PDO, $id){
    //Update a status para darse de abja
    try{
        $stmt = $PDO->prepare("UPDATE usuarios SET status = 'baja' WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
function cambiarPassword($PDO,$id,$password){
    try{
        $stmt = $PDO->prepare("UPDATE usuarios SET pass = :password WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
function getStatus($PDO, $id){
    //Obtener el valor de status, se utiliza en intranet.php para mostrar un contenido u otro
    try{
        $stmt = $PDO->prepare("SELECT status FROM usuarios WHERE id = :id");
        $stmt-> bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['status'];
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return null;
}
function getFullName($PDO, $id){
    //Devuelve un String con el nombre completo con iniciales en mayúscula, se utiliza para mostrar quien esta conectado
    try{
        $stmt = $PDO->prepare("SELECT nombre, apellido1, apellido2 FROM usuarios WHERE id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $nombre = $stmt->fetch(PDO::FETCH_ASSOC);
        return ucwords($nombre["nombre"] . " " . $nombre["apellido1"] . " " . $nombre["apellido2"], " ");
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return null;
}
function getPassword($PDO,$username){
    //Obtiene la contraseña
    try{
        $stmt = $PDO->prepare("SELECT pass FROM usuarios WHERE username = :username;");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $pass = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pass["pass"];
    }catch (Exception $e){
        echo $e->getMessage();
    }
    return null;
}
function insertarUsuario($PDO, $name, $surname1, $surname2, $username, $password){
    //Insert del usuario
    try{
        $alta = "alta";
        $stmt = $PDO->prepare("INSERT INTO usuarios(nombre, apellido1, apellido2, username, pass, status)
        VALUES (:nombre, :apellido1, :apellido2, :username, :pass, :status)");
        $stmt->bindParam(':nombre',$name);
        $stmt->bindParam(':apellido1',$surname1);
        $stmt->bindParam(':apellido2',$surname2);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':pass',$password);
        $stmt->bindParam(':status',$alta);
        $stmt->execute();

    }catch(Exception $e){
        echo $e->getMessage();
    }
}
