<?php 

class Coment {
    private $_id;
    private $_iduser;
    private $_idpost;
    private $_nombreuser;
    private $_texto;

    public function __construct($id,$iduser,$idpost, $nombreuser, $texto) {
        $this->setId($id);
        $this->setIdAutor($iduser);
        $this->setIdPost($idpost);
        $this->setNombre($nombreuser);
        $this->setTexto($texto);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }
    public function getIdAutor() {
        return $this->_iduser;
    }

    public function setIdAutor($iduser) {
        $this->_iduser = $iduser;
    }


    public function getIdPost() {
        return $this->_idpost;
    }

    public function setIdPost($idpost) {
        $this->_idpost = $idpost;
    }
    public function getNombre() {
        return $this->_nombreuser;
    }

    public function setNombre($nombreuser) {
        $this->_nombreuser = $nombreuser;
    }

    public function getTexto() {
        return $this->_texto;
    }

    public function setTexto($texto) {
        $this->_texto = $texto;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["iduser"] = $this->getidAutor();
        $array["idpost"] = $this->getidPost();
        $array["nombreuser"] = $this->getNombre();
        $array["texto"] = $this->getTexto();

        return $array;
    }
}

?>