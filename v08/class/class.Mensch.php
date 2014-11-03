<?php

class Mensch extends Lebewesen{
    private $name;
    private $geschlecht;
    protected static $vorfahre = "Adam";

    public function __construct($name,$geschlecht){
        $this->alter=1;
        $this->name=$name;
        $this->geschlecht=$geschlecht;
    }

    public function __destruct(){
        echo "Mensch ist gestorben";
    }

    public function altern(){
        $this->alter++;
    }

    public function getName(){
        return $this->name;
    }

    public function umbenennen($name){
        $this->name=$name;
    }

    public function geburtstagFeiern(){
        $this->altern();
        echo "HAPPY BIRTHDAY! Wir gratulieren zum ".$this->alter.".Geburtstag.";
    }

    public function neueEvolutionstheorie($vorfahre){
        self::$vorfahre=$vorfahre;
    }

    public function  getVorfahre(){
        return self::$vorfahre;
    }
}
?>