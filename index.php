<?php
/**
 * Ejercicio1:
 * Hacer una estructura de control que segun el dia que sea 
 * devuelva la web que diga en dia estamos
 */
    function queDiaEs($n = 0){
        //la variable $n permite sumarle dias para ver que dia sera dentro de $n dias
        $date = date("D");
        $today = date("D", strtotime($date."+ $n days"));
        $link = "";
        
        switch ($today) {
            case "Mon":
                $link = "<p>Hoy es Lunes: <a href=\"https://www.google.es/search?q=lunes&sca_esv=25ac67c7e3425c2e&ei=EuAPZ6_pPNKSkdUPrqWQ0Qk&ved=0ahUKEwivuufmn5OJAxVSSaQEHa4SJJoQ4dUDCA8&uact=5&oq=lunes&gs_lp=Egxnd3Mtd2l6LXNlcnAiBWx1bmVzMgoQABiABBhDGIoFMgUQABiABDIKEAAYgAQYQxiKBTIFEAAYgAQyBRAuGIAEMgUQABiABDIFEAAYgAQyBRAuGIAEMgUQABiABDIFEAAYgARIwh1QwBJY1RxwA3gBkAEEmAGSAaAB9guqAQQwLjEyuAEDyAEA-AEBmAIIoAKNBqgCCsICChAAGLADGNYEGEfCAg0QABiABBiwAxhDGIoFwgIOEAAYsAMY5AIY1gTYAQHCAhMQLhiABBiwAxhDGMgDGIoF2AEBwgIWEC4YgAQYsAMYQxjUAhjIAxiKBdgBAcICEBAAGIAEGLEDGEMYgwEYigXCAggQLhiABBjUAsICExAuGIAEGEMYtAIYigUY6gLYAQLCAhMQABiABBhDGLQCGIoFGOoC2AECwgIWEC4YgAQYQxjUAhi0AhiKBRjqAtgBAsICCxAAGIAEGLEDGIMBwgIREC4YgAQYsQMY0QMYgwEYxwHCAgoQLhiABBhDGIoFwgIOEC4YgAQYsQMYgwEYigXCAgsQLhiABBixAxiDAcICDhAAGIAEGLEDGIMBGIoFwgIZEC4YgAQYQxiKBRiXBRjcBBjeBBjfBNgBAcICCBAAGIAEGLEDmAMJiAYBkAYTugYGCAEQARgJugYECAIYB5IHAzMuNaAH8LAB&sclient=gws-wiz-serp\">Monday</a></p>";
                break;
            case "Tue":
                $link = "<p>Hoy es Martes: <a href=\"https://www.google.es/search?q=martes&sca_esv=25ac67c7e3425c2e&ei=WOAPZ5jML-34kdUPoYnP8Qk&ved=0ahUKEwiY2IqIoJOJAxVtfKQEHaHEM54Q4dUDCA8&uact=5&oq=martes&gs_lp=Egxnd3Mtd2l6LXNlcnAiBm1hcnRlczIKEAAYgAQYQxiKBTILEAAYgAQYsQMYgwEyCxAuGIAEGNEDGMcBMgUQABiABDIFEAAYgAQyCxAAGIAEGLEDGIMBMgUQABiABDIIEC4YgAQY1AIyBRAAGIAEMgUQLhiABEjgCFD-A1iLCHABeAGQAQCYAcgBoAGiBqoBBTAuNC4xuAEDyAEA-AEBmAIGoALlBsICChAAGLADGNYEGEfCAg0QABiABBiwAxhDGIoFwgIOEAAYsAMY5AIY1gTYAQHCAhYQLhiABBiwAxhDGNQCGMgDGIoF2AEBwgITEC4YgAQYsAMYQxjIAxiKBdgBAcICChAuGIAEGEMYigXCAhEQLhiABBixAxjRAxiDARjHAcICDhAuGIAEGLEDGIMBGIoFwgILEC4YgAQYsQMYgwHCAhAQABiABBixAxhDGIMBGIoFwgIIEC4YgAQYsQOYAwCIBgGQBhK6BgYIARABGAmSBwUxLjQuMaAHwU4&sclient=gws-wiz-serp\">Tuesday</a></p>";
                break;        
            case "Wed":
                $link = "<p>Hoy es Miercoles: <a href=\"https://www.google.es/search?q=miercoles&sca_esv=25ac67c7e3425c2e&source=hp&ei=2N8PZ6K0EI2ukdUPhKalgQg&iflsig=AL9hbdgAAAAAZw_t6EExcPySK1ZKYUK2ftwzePdF2T1o&ved=0ahUKEwiigOfKn5OJAxUNV6QEHQRTKYAQ4dUDCBY&uact=5&oq=miercoles&gs_lp=Egdnd3Mtd2l6IgltaWVyY29sZXMyCxAAGIAEGLEDGIMBMggQLhiABBjUAjIIEC4YgAQY1AIyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAESKmhAVCHmwFYwaABcAF4AJABAJgBnQGgAdgHqgEDMC44uAEDyAEA-AEBmAIIoAKWCKgCAMICERAuGIAEGLEDGNEDGIMBGMcBwgIOEC4YgAQYsQMYgwEYigXCAgsQLhiABBixAxiDAcICCBAAGIAEGLEDwgIFEC4YgATCAggQLhiABBixA8ICDRAAGIAEGLEDGIMBGAqYAwqSBwMwLjigB5FU&sclient=gws-wiz\">Wednesday</a></p>";
                break;
            case "Thu":
                $link = "<p>Hoy es Jueves: <a href=\"https://www.google.es/search?q=jueves&sca_esv=25ac67c7e3425c2e&ei=ZeAPZ_7WGNmpkdUPhOLM2As&ved=0ahUKEwi-nY2OoJOJAxXZVKQEHQQxE7sQ4dUDCA8&uact=5&oq=jueves&gs_lp=Egxnd3Mtd2l6LXNlcnAiBmp1ZXZlczITEC4YgAQYsQMYQxiDARjUAhiKBTIFEAAYgAQyChAAGIAEGEMYigUyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMiIQLhiABBixAxhDGIMBGNQCGIoFGJcFGNwEGN4EGOAE2AEBSMAKUNkFWIgKcAN4AZABAJgBpgGgAZIFqgEDMC41uAEDyAEA-AEBmAIIoAKCBsICChAAGLADGNYEGEfCAg0QABiABBiwAxhDGIoFwgIWEC4YgAQYsAMYQxjUAhjIAxiKBdgBAcICExAuGIAEGLADGEMYyAMYigXYAQHCAgsQABiABBixAxiDAcICDRAuGIAEGEMY1AIYigXCAg4QLhiABBixAxiDARiKBcICERAuGIAEGLEDGNEDGIMBGMcBwgILEC4YgAQY0QMYxwHCAhAQABiABBixAxhDGIMBGIoFwgIFEC4YgATCAgsQLhiABBixAxiDAZgDAIgGAZAGE7oGBggBEAEYCJIHAzMuNaAHpDo&sclient=gws-wiz-serp\">Thursday</a></p>";
                break;
            case "Fri":
                $link = "<p>Hoy es Viernes: <a href=\"https://www.google.com/search?client=firefox-b-d&q=viernes\">Friday</a></p>";
                break;
            case "Sat":
                $link = "<p>Hoy es Sabado: <a href=\"https://www.google.com/search?q=sabado&client=firefox-b-d&sca_esv=25ac67c7e3425c2e&ei=7uAPZ73NJL6Rxc8PsebnwQk\">Saturday</a></p>";
                break;
            case "Sun":
                $link = "<p>Hoy es Domingo: <a href=\"https://www.google.com/search?q=domingo&client=firefox-b-d&sca_esv=25ac67c7e3425c2e&ei=DuEPZ-3nJu6Uxc8PyKGeuQM&ved=0ahUKEwjtpubeoJOJAxVuSvEDHciQJzcQ4dUDCA8&uact=5&oq=domingo&gs_lp=Egxnd3Mtd2l6LXNlcnAiB2RvbWluZ28yChAAGIAEGEMYigUyChAAGIAEGEMYigUyChAAGIAEGEMYigUyBRAuGIAEMgUQABiABDIKEAAYgAQYQxiKBTIFEC4YgAQyBRAAGIAEMgUQLhiABDIFEAAYgARI4Q9Q1wVY7A1wA3gBkAEAmAGkAaABxweqAQMwLje4AQPIAQD4AQGYAgqgAqMIwgIKEAAYsAMY1gQYR8ICDRAAGIAEGLADGEMYigXCAgsQABiABBixAxiDAcICFhAuGIAEGLEDGNEDGIMBGMcBGIoFGArCAg4QLhiABBixAxjRAxjHAcICDhAAGIAEGLEDGIMBGIoFwgIREC4YgAQYsQMY0QMYgwEYxwHCAgsQLhiABBixAxiDAZgDAIgGAZAGCpIHAzMuN6AHtGc&sclient=gws-wiz-serp\">Sunday</a></p>";
                break;
            default:
                $link = "<p>Error: se acabo el mundo, no es ningun dia</p>";
        }
        return $link;
    }

    /**
     * Ejercicio2:
     * Estructura de control que determine el resultado de un alumno segun la nota
    */
    function resultadoNotas($nota){
        $resultado = "<p>$nota es ";
        switch($nota){
            case 1:
            case 2:
            case 3:
            case 4:
                $resultado .= "Suspenso</p>";
                break;
            case 5:
                $resultado .= "Aprobado</p>";
                break;
            case 6:
                $resultado .= "Bien</p>";
                break;
            case 7:
            case 8:
                $resultado .= "Notable</p>";
                break;
            case 9:
            case 10:
                $resultado .= "Excelente</p>";
                break;
            default: 
                $resultado = "<p>$nota no es una nota valida</p>";
                break;
        }
        return $resultado;
    }
    /**
     * Ejercicio3: Hacer que las notas admitan decimales
     */
    function resultadoNotasDecimales($nota){
        $resultado = "<p>$nota es ";
        if($nota < 1.0){
            $resultado = "$nota no es una nota valida</p>";
        }elseif($nota < 5.0){
            $resultado .= "Suspenso</p>";
        }elseif($nota < 6.0){
            $resultado .= "Aprobado</p>";
        }elseif($nota < 7.0){
            $resultado .= "Bien</p>";
        }elseif($nota < 9.0){
            $resultado .= "Notable</p>";
        }elseif($nota <= 10.0){
            $resultado .= "Excelente</p>";
        }else{
            $resultado = "<p>$nota no es una nota valida</p>";
        }
        return $resultado;
        //He utilizado este método porque me parece le más sencillo y limpio.
        //Con el switch me parece mas lioso para poner comprobaciones
    }

    /**
     * Ejercicio 4: usar try catch para ver si contiene numeros 
     * o caracteres especiales y si tiene name
     */
    class myException extends Exception{
        
    }
    function comprobarStringName($name = "Named"){
        try{
            if(preg_match("/\d|\W/", $name)){
                throw new myException("$name contiene caracteres que no son letras");
            }elseif(preg_match("/name/", strtolower($name))){
                throw new myException("$name contiene la palabra name");
            }else{
                throw new myException("$name no contiene caracteres que no sean letras pero tampoco la palabra name");
            }
        }catch(myException $e){
            return $e->getMessage()."";
        }
    }
?>  
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>
    <?php
        //echo queDiaEs();//Ejercicio1.
        //echo resultadoNotas(nota: -5);//Ejercicio2. Parametro obligatorio
        //echo resultadoNotasDecimales(0);//Ejercicio3. Parametro obligatorio
        //echo comprobarStringName();//Ejercicio 4.
    ?>
</body>
</html>