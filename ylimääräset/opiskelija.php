<?php

require("../mun/partials/yhteys.php");

class Character {
    private $charId;
    private $username;
    private $email;
    private $phone;
    
    public function __construct($username, $email, $phone)
    {

        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;

        // get from db
        $this->charId = null; 
    }

    public function getId() {
        return $this->charId;
    }

    public function setName($name) {
        $this->username = $name;
    } 

    public function getName() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function saveCharacter()
    {
        GLOBAL $pdo;

        $sql = "INSERT INTO characters (username, email, phone) VALUES (?, ?, ?)";
	    $data = array ($this->username, $this->email, $this->phone);
	    $stmt = $pdo->prepare($sql);
        
        if($stmt->execute($data)) {
            return true;
        }

        return false;

    }

    public function printCharacter()
    {
        echo "<p>Nimi: ". $this->username ."</p>";
        echo "<p>Email: ". $this->email ."</p>";
        echo "<p>Puhelinnro.: ". $this->phone ."</p>";
    }
    
}

?>
