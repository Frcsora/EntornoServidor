<?php
    require_once "connection.php";
    session_start();
    //En la sesion ["usuario"] esta guardada la id del usuario en la base de datos
    /*En esta página he puesto varias funcionalidades adicionales tales como cambiar la password o, en el caso de que la cuenta
    este dada de baja, la posibilidad de recuperarla a través de introducir la contraseña de la cuenta*/
    $inactividad = 300;
    if(isset($_SESSION["timeout"])){
        $sessionTTL= time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            setcookie("timeoutFinalizado", 1, time() + 60 * 10);
            header("Location: logout.php");
            exit;
        }
    }
    $_SESSION["timeout"] = time();
    $status = getStatus(conectarBBDD(), $_SESSION["usuario"]);
    $usuario = getFullName(conectarBBDD(), $_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    if(isset($_POST["change"])){
        //Caso cambiando contraseña
        //Esto solo se ejecutara si el usuario esta intentando cambiar la contraseña
        echo "<form method='POST' action='disable.php'>
                <label>Nueva contraseña: </label>
                <input type='password' name='passchange' placeholder='Password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{6,14}' title='Debe tener una mayúscula, una minúscula, un número y un caracter especial' required>
                <input type='submit' value='Cambiar contraseña'>
             </form>";
    }elseif($status === "alta"){
        //Caso usuario de alta
        //Esto es lo que se verá si el usuario está de alta
        echo "<p>Esta es la intranet de <strong id='usuario'>$usuario</strong></p>";
        echo "<form method='POST' action='disable.php'>
                <input value='Darse de baja' name='baja' type='submit'>
              </form><br>
              <form method='POST' action='intranet.php'>
                <input type='submit' value='Cambiar contraseña' name='change'><br><br>
              </form>";
              if(isset($_COOKIE["registrobien"])){
                  setcookie("registrobien", 1, time() - (86400 * 30), "/");
                  echo "<p>Registro Exitoso</p>";
              }
              ?>
        <!-- Mostrar chat -->
        <div id="mensajesDiv" class="mensajesDiv" style="border: 1px solid #000; padding: 10px; width: 50%; margin-bottom: 20px;">
            <h3>Mensajes:</h3>
            <?php

            /*while ($row = $mensajes->fetch_assoc()){ ?>
                <p><strong><?php echo htmlspecialchars($row['nombre']); ?>:</strong> <?php echo htmlspecialchars($row['mensaje']); ?></p>
            <?php } */?>
        </div>

        <!-- Enviar mensaje -->
        <form method="POST" id="form">
            <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje..." required></textarea>
            <br>
            <button type="submit" id="boton">Enviar</button>
        </form>
    <?php }elseif(isset($_POST["dandoalta"])){
        //Esto es lo que se verá si el usuario esta intentando recuperar la cuenta
        //Caso dando de alta
        echo "<form method='POST' action='disable.php'>
                <label>Confirme su contraseña para recuperar su cuenta: </label>
                <input type='password' name='passalta' required><br>
                <input value='Recuperar cuenta' name='alta' type='submit'>
              </form>";
    }else{
        //Esto es lo que se verá si el usuario hace login pero esta de baja
        //Caso dandose de baja
        echo "<p>Este usuario se ha dado de baja</p>";
        echo "<form method='POST' action='intranet.php'>
                <input value='Darse de alta' name='dandoalta' type='submit'>
              </form><br>";
    }
?>
<?php
    //Botones para salir
    if(!isset($_POST["dandoalta"])){ ?>
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Cerrar sesion">
            <input type="submit" name="disconnect" value="Desconectar">
        </form>
<?php } ?>
<script src="js.js"></script>
</body>
</html>
