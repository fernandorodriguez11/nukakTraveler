<?php

class Usuario{

    private $idAdministrador;
    private $nombre;
    private $email;
    private $passwordAdmin;

    function getIdAdministrador()
    {
        return $this->idAdministrador;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPasswordAdmin()
    {
        return $this->passwordAdmin;
    }

    function setIdAdministrador($idAdministrador)
    {
        $this->idAdministrador = $idAdministrador;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setEmail($email)
    {
        $email = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    function setPasswordAdmin($passwordAdmin)
    {
        $this->passwordAdmin = $passwordAdmin;
    }

    public function obtener_email($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("select * from administrador where email = ?");

        if (!$consulta) {
            echo "Error en la consulta preparada: " . $conexion->error;
            die();
        }

        if (!$consulta->bind_param("s", $email)) {
            echo "Error en el bind_param " . $conexion->error;
            die();
        }

        if (!$consulta->execute()) {
            echo "Error al ejecutar la consulta " . $conexion->error;
            die();
        }

        if (!$result = $consulta->get_result()->fetch_assoc()) {
            return false;
        }

        //Asigna los valores a las propiedades del objeto
        $this->setIdAdministrador($result['idAdministrador']);
        $this->setNombre($result['nombre']);
        $this->setEmail($result['email']);
        $this->setPasswordAdmin($result['passwordAdmin']);

        $consulta->close();
        $conexion->close();

        return true;
    }
}