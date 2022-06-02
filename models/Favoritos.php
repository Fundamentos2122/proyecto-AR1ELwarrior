<?php 

class Fav {
    private $_id;
    private $_iduser;
    private $_idimg;

    public function __construct($id,$iduser, $idimg) {
        $this->setId($id);
        $this->setIdCreador($iduser);
        $this->setIdImagen($idimg);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getIdCreador() {
        return $this->_iduser;
    }

    public function setIdCreador($iduser) {
        $this->_iduser = $iduser;
    }
    public function getIdImagen() {
        return $this->_idimg;
    }

    public function setIdImagen($idimg) {
        $this->_idimg =$idimg;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["iduser"] = $this->getIdCreador();
        $array["idimg"] = $this->getIdImagen();
        return $array;
    }
}

?>