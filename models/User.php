<?php 

class User {
    private $_id;
    private $_nombre;
    private $_email;
    private $_password;
    private $_type;

    public function __construct($id, $nombre, $email, $password, $type) {
        $this->setId($id);
        $this->setUsername($nombre);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setType($type);
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getUsername() {
        return $this->_nombre;
    }

    public function setUsername($nombre) {
        $this->_nombre = $nombre;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setPassword($password) {
        $this->_password = base64_encode($password);
    }

    public function getType() {
        return $this->_type;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    public function getArray() {
        $array = array();

        $array["id"] = $this->getId();
        $array["nombre"] = $this->getUsername();
        $array["password"] = $this->getPassword();
        $array["type"] = $this->getType();

        return $array;
    }
}

?>