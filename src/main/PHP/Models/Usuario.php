<?php
class Usuario {
    public $Id_User;
    public $Nombre;
    public $Apellido;
    public $Direccion;
    public $Telefono;
    public $Correo;
    public $Contrasena;

    public function __construct($nombre, $apellido, $direccion, $telefono, $correo, $contrasena) {
        $this->Nombre = $nombre;
        $this->Apellido = $apellido;
        $this->Direccion = $direccion;
        $this->Telefono = $telefono;
        $this->Correo = $correo;
        $this->Contrasena = $contrasena;
    }
}

