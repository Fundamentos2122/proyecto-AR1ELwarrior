<?php 

class Art {
    private $_id;
    private $_idUser;
    private $_nombre;
    private $_descripcion;
    private $_imagen;
    private $_genero;
    private $_timestamp;

    public function __construct($id, $idUser,$nombre,$descripcion, $imagen, $genero) {
        $this->setId($id);
        $this->setidCreador($idUser);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setImagen($imagen);
        $this->setGenero($genero);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getidCreador() {
        return $this->_idUser;
    }

    public function setidCreador($idUser) {
        $this->_idUser = $idUser;
    }
    public function getNombre() {
        return $this->_nombre;
    }

    public function setNombre($nombre) {
        return $this->_nombre = $nombre;
    }

    public function getImagen() {
        return $this->_imagen;
    }

    public function setImagen($imagen) {
        $this->_imagen = base64_encode($imagen);
    }
    public function getDescripcion() {
        return $this->_descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->_descripcion = $descripcion;
    }
    public function getGenero() {
        return $this->_genero;
    }

    public function setGenero($genero) {
        $this->_genero = $genero;
    }

    public function getTimestamp() {
        return $this->_timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->_timestamp = $timestamp;
    }


    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["idUser"] = $this->getidCreador();
        $array["nombre"] = $this->getNombre();
        $array["descripcion"] = $this->getDescripcion();
        $array["imagen"] = $this->getImagen();      
        $array["genero"] = $this->getGenero();
        return $array;
    }
}

?>