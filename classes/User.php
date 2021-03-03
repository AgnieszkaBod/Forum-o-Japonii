<?php

class User {

    protected $name;
    protected $surname;
    protected $email;
    protected $passwd;

    function __construct($name, $surname, $email, $passwd) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    }

    function setName($newName) {
        $this->name = $newName;
    }

    function getName() {
        return $this->name;
    }

    function setSurName($newSurName) {
        $this->surname = $newSurName;
    }

    function getSurName() {
        return $this->surname;
    }

    function setPassword($newpasswd) {
        $this->passwd = password_hash($newpasswd, PASSWORD_DEFAULT);
    }

    function getPassword() {
        return $this->passwd;
    }

    function setEmail($newmail) {
        $this->email = $newmail;
    }

    function getEmail() {
        return $this->email;
    }

    function saveDB($db) {
        $sql = "INSERT INTO `users` (`id`, `imie`, `nazwisko`, `email`, `haslo`) VALUES (NULL, '" . $this->name . "', '" . $this->surname . "', '" . $this->email . "', '" . $this->passwd . "');";
        var_dump($sql);
        $db->execute($sql);
    }

}

?>
