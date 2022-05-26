<?php 

class Art {
    private $_id;
    private $_creador;
    private $_imagen;
    private $_comentario;

    public function __construct($id, $creador, $imagen, $comentario) {
        $this->setId($id);
        $this->setCreador($creador);
        $this->setImagen($imagen);
        $this->setComment($comentario);
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

    public function getComment() {
        return $this->_comentario;
    }

    public function setComment($comentario) {
        $this->_comentario= $comentario;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["creador"] = $this->getCreador();
        $array["imagen"] = $this->getImagen();
        $array["comentario"] = $this->getComment();

        return $array;
    }
}

?>