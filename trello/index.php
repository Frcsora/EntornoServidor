<?php
session_start();
require_once 'pedirListas.php';
$conn = new connector();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trello</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Trello de FRC</h1>
</header>
<main id="tablero">
    <section id="board-container">
        <?php
        foreach($_SESSION['listas'] as $key => $value){
                $tarjetas= $conn->selectTarjetas($value['id']);?>
            <section class="list" title="<?php echo $value['fecha'];?>">
                <h3 class="list-title"><?php echo $value['nombre']; ?></h3>
                <section id="cards<?php echo $value['id'];?>">
                    <?php
                        foreach($tarjetas as $tarjeta){?>
                            <section style="background-color: <?php echo $tarjeta['colorfondo'] ?>; color: <?php echo $tarjeta['colorletra'] ?>" draggable="true" class="<?php if($tarjeta['importante'] == 1) echo "importante " ?>card" id="tarjeta<?php echo $tarjeta['id_lista']."t".$tarjeta['id'];?>" title="Fecha de creación: <?php echo $tarjeta['fecha'];?>">
                                <section class="flex flexcard">
                                    <p><?php echo $tarjeta['texto'] ?></p>
                                    <button class="botontarjeta">X</button>
                                    <button class="botonpopup"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg></button>
                                </section>
                                <section class="pop-up hidden flexcard">
                                    <label>Color de letra</label>
                                    <input type="color" class="inputletra" name="color" value="<?php echo $tarjeta['colorletra']; ?>">
                                    <label>Color de fondo</label>
                                    <input type="color" class="inputcolorfondo" name="color" value="<?php echo $tarjeta['colorfondo']; ?>">
                                    <label>Marcar como importante</label>
                                    <input type="checkbox" class="checkboximportante" name="importante" <?php if($tarjeta['importante'] == 1) echo "checked='true'"; ?>>
                                    <button class="botoncerrarpopup">X</button>
                                </section>
                            </section>
                        <?php }
                    ?>
                </section>
                <section class="botonera">
                    <button class="add-card">Añadir tarjeta</button>
                    <button class="delete-list">Eliminar lista</button>
                </section>
            </section>
        <?php }
        ?>
    </section>
    <form method="POST" action="insertarLista.php">
        <label for="nombre">Nombre de la lista</label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <input type="submit" value="Crear lista">
    </form>
</main>
<script src="script.js"></script>
</body>
</html>