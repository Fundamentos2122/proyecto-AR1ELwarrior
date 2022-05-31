<?php 

class User {
    private $_id;
    private $_idAutor;
    private $_idPost;
    private $_texto;

    public function __construct($id,$idAutor,$idPost, $texto) {
        $this->setId($id);
        $this->setIdAutor($idAutor);
        $this->setNombre($idPost);
        $this->setEmail($texto);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }
    public function getIdAutor() {
        return $this->_idAutor;
    }

    public function setIdAutor($idAutor) {
        $this->_idAutor = $idAutor;
    }


    public function getidPost() {
        return $this->_idPost;
    }

    public function setidPost($idPost) {
        $this->_idPost = $idPost;
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
        $array["idAutor"] = $this->getidAutor();
        $array["idPost"] = $this->getidPost();
        $array["texto"] = $this->getTexto();

        return $array;
    }
}

?>