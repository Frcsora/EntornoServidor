<?php

class connector
{
    private $connection;
    public function __construct(){
        $type = "mysql";
        $host = "localhost";
        $dbname = "trello";
        $user = "root";
        $password = "";
        try{
            $this -> connection = new PDO("$type:host=$host;dbname=$dbname", $user, $password);
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function connect(){
        return $this -> connection;
    }

    function insertList($PDO, $list){
        $data = json_decode($list);
        $nombre = $data->nombre;
        try{
            $PDO->beginTransaction();
            $stmt = $this -> connection -> prepare("INSERT INTO listas (nombre) VALUES (:nombre)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }

    function selectList(){
        $stmt = $this -> connection -> prepare("SELECT * FROM listas WHERE status = 'activa'");
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);;
    }
    function deleteList($PDO, $list){
        try{
            $PDO -> beginTransaction();
            $stmt = $this -> connection -> prepare("UPDATE listas SET status = 'eliminada' WHERE id = :id");
            $stmt->bindParam(':id', $list);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function insertarTarjeta($PDO, $data, $id){
        $id_lista = $data['id_lista'];
        $tabla_actual = $data['tabla_actual'];
        try{
            $PDO -> beginTransaction();
            $stmt = $this -> connection -> prepare("INSERT INTO tarjetas (id_lista,id,tabla_actual) VALUES (:id_lista,:id,:tabla_actual)");
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tabla_actual', $tabla_actual);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function selectTarjetas($id){
        $stmt = $this -> connection -> prepare("SELECT * FROM tarjetas WHERE tabla_actual = :id AND status = 'activa'");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    function deleteTarjeta($PDO, $data){
        $id = $data['id'];
        $id_lista = $data['id_lista'];
        try{
            $PDO -> beginTransaction();
            $stmt = $this->connection -> prepare("UPDATE tarjetas SET status = 'eliminada' WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function cambiarTexto($PDO, $data){
        $id_lista = $data['id_lista'];
        $id = $data['id'];
        $texto = $data['texto'];
        try{
            $PDO -> beginTransaction();
            $stmt = $this->connection -> prepare("UPDATE tarjetas SET texto = :texto WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':texto', $texto);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function ultimatarjetalista($lista){
        $stmt = $this -> connection -> prepare("SELECT COUNT(id) AS total FROM tarjetas WHERE id_lista = :id_lista GROUP BY id_lista");
        $stmt->bindParam(':id_lista', $lista);
        $stmt->execute();
        return $stmt -> fetchColumn();
    }

    function actualizarListaActual($PDO, $datos){
        $id_lista = $datos['id_lista'];
        $id = $datos['id'];
        $tabla_actual = $datos['tabla_actual'];
        try{
            $PDO -> beginTransaction();
            $stmt = $PDO -> prepare("UPDATE tarjetas SET tabla_actual = :tabla_actual WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':tabla_actual', $tabla_actual);
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function actualizarColor($PDO, $datos, $flag = true){
        $queCambiar = $flag ? "colorfondo" : "colorletra";
        $id_lista = $datos['id_lista'];
        $id = $datos['id'];
        $color = $datos['color'];
        try{
            $PDO -> beginTransaction();
            $stmt = $PDO -> prepare("UPDATE tarjetas SET $queCambiar = :color WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':color', $color);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }

    function actualizarImportante($PDO, $datos){
        $id_lista = $datos['id_lista'];
        $id = $datos['id'];
        $importante = $datos['importante'];
        try{
            $PDO -> beginTransaction();
            $stmt = $PDO -> prepare("UPDATE tarjetas SET importante = :importante WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':importante', $importante);
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
    function actualizarPosicion($PDO, $datos){
        $id_lista = $datos['id_lista'];
        $id = $datos['id'];
        $posicion = $datos['posicion'];
        try{
            $PDO -> beginTransaction();
            $stmt = $PDO -> prepare("UPDATE tarjetas SET orden = :posicion WHERE id_lista = :id_lista AND id = :id");
            $stmt->bindParam(':posicion', $posicion);
            $stmt->bindParam(':id_lista', $id_lista);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $PDO ->commit();
        }catch (PDOException $e){
            $PDO ->rollBack();
            echo "Error: ".$e -> getMessage();
        }
    }
}