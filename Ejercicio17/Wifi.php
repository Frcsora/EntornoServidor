<?php

trait Wifi
{
    private $wifiConnect;
    function getWifiConnect($nombre){
        if($this->wifiConnect){
            $estado = "Conectado";
        }else{
            $estado = "Desconectado";
        }
        return $nombre . " " . $estado;
    }
    function conectarWifi($nombre){
        $this->wifiConnect = true;
        return $nombre . " se conectó al wifi";
    }
    function desconectarWifi($nombre){
        $this->wifiConnect = false;
        return $nombre . " se desconectó del wifi";
    }
}