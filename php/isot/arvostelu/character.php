<?php

require("../../partials/yhteys.php");

class Character {
    private $charId;
    private $name;
    private $classId;
    private $raceId;
    private $stats;

    public function __construct($name)
    {
        // get from db
        $this->charId = null; 
        $this->name = $name; 
        $this->classId = rand(0, 4); 
        $this->raceId = rand(0, 4); 

        // race changes what stats you get
        $stats = array('hp' => 100, 'mp' => 100, 'dex' => 0, 'def' => 0, 'spd' => 0, 'wis' => 0, 'vit' => 0, 'att' => 0);
        $this->stats = json_encode($stats);

    }

    public function getId() {
        return $this->charId;
    }

    public function setName($name) {
        $this->name = $name;
    } 

    public function saveCharacter()
    {
        GLOBAL $pdo;

        $sql = "INSERT INTO h11_characters (name, raceId, classId, stats) VALUES (?, ?, ?, ?)";
	    $data = array($this->name, $this->raceId, $this->classId, $this->stats);
	    $stmt = $pdo->prepare($sql);
        
        if($stmt->execute($data)) {
            return true;
        }

        return false;

    }

    public function printCharacter()
    {
        
    }
    
}

?>
