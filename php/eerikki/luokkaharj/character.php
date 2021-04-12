<?php
// harj 14.3
// character.php

class Character {
	// mieti mitä tietokannan taulussasi oli:
	// kenttiä vastaa nyt muuttujat
	private $name;
	private $strength;
	private $dexterity;
	private $constitution;
	private $charisma;
	private $wisdom;
	private $intelligence;
	private $characterID; // tarvitaanko?
	private $raceID; // miten tämä?
	private $classID; // miten tämä?
	
	// tarvitaan rakennin
	public function __construct($name) {
		// aseta nimi ja arvo muut tiedot
		$this->name = $name;
		// arvo muuttujille sopivat arvot
		$this->raceID = rand(1,4);
		$this->classID = rand(1,4);
	}
	// ja tulosta tiedot
	public function tulosta_hahmo() {
		echo "<h4>" . $this->name . "</h4>";
		echo "class:" . $this->classID . "<br />";
		echo "race:" . $this->raceID . "<br />";
	}
	// tallenna hahmo
	public function tallenna_hahmo() {
		// katso mallia harjoituksesta 11.2, 
		// siellä tehtiin insert-kysely
	}
}




?>