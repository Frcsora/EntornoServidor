<?php

trait Bluetooth
{
    public $bluetoothConnect;
    function getBluetoothConnect($nombre){

        if($this->bluetoothConnect){
            $estado = "Conectado";
        }else{
            $estado = "Desconectado";
        }
        return $nombre . " " . $estado;
    }
    function conectarBluetooth($nombre){
        $this->bluetoothConnect = true;
        return $nombre . " conectó el bluetooth";
    }
    function disconnectBluetooth($nombre){
        $this->bluetoothConnect = false;
        return $nombre . " desconectó el bluetooth";
    }

}