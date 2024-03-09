<?php

class User {
    private $userID;
    private $username;
    private $password;
    private $email;

    public function __construct($userID, $username, $password, $email) {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }
}
