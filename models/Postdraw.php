<?php 

class Art {
    private $_id;
    private $_creador;
    private $_imagen;
    private $_comentario;
    private $_timestamp;
    private $_active;

    public function __construct($id, $creador, $imagen, $comentario,$timestamp,$active) {
        $this->setId($id);
        $this->setCreador($creador);
        $this->setImagen($imagen);
        $this->setComentario($comentario);
        $this->setTimestamp($timestamp);
        $this->setActive($active);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getCreador() {
        return $this->_creador;
    }

    public function setCreador($creador) {
        $this->_creador = $creador;
    }
    public function getImagen() {
        return $this->_imagen;
    }

    public function setImagen($imagen) {
        $this->_imagen = $imagen;
    }
    public function getComentario() {
        return $this->_comentario;
    }

    public function setComentario($comentario) {
        $this->_comentario = $comentario;
    }

    public function getTimestamp() {
        return $this->_timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->_timestamp = $timestamp;
    }

    public function getActive() {
        return $this->_active;
    }

    public function setActive($active) {
        $this->_active= $active;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["creador"] = $this->getCreador();
        $array["imagen"] = $this->getImagen();
        $array["comentario"] = $this->getComentario();
        $array["timestamp"] = $this->getTimestamp();
        $array["active"] = $this->getActive();

        return $array;
    }
}

?>