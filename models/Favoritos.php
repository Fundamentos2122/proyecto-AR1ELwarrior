<?php 

class Art {
    private $_id;
    private $_idcreador;
    private $_imagen;

    public function __construct($id, $idcreador, $imagen) {
        $this->setId($id);
        $this->setidCreador($idcreador);
        $this->setImagen($imagen);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getidCreador() {
        return $this->_idcreador;
    }

    public function setidCreador($idcreador) {
        $this->_idcreador = $idcreador;
    }

    public function getImagen() {
        return $this->_imagen;
    }

    public function setImagen($imagen) {
        $this->_imagen = $imagen;
    }


    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["idcreador"] = $this->getidCreador();
        $array["imagen"] = $this->getImagen();
        return $array;
    }
}

?>