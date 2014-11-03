<?php
require_once realpath(dirname(__FILE__))."/class/class.Lebewesen.php";
require_once realpath(dirname(__FILE__))."/class/class.Mensch.php";
require_once realpath(dirname(__FILE__))."/class/class.Schweizer.php";


class Aufgabe3{
    public function show(){
        echo '<h1>Aufgabe 3: Anweisungen ausführen</h1>';

        $mensch = new Mensch("Chris Bachmann","m");
        echo '<p>Name von Mensch: '.$mensch->getName().' </p>';
        $mensch->umbenennen('John Wayne');
        echo '<p>Neuer Name von Mensch: '.$mensch->getName().' </p>';
        echo '<p>'.$mensch->getName().' ist '.$mensch->getAlter().' Jahre alt</p>';
        if ("Mensch" == get_class($mensch)) {
            echo '<p>'.$mensch->getName().' ist ein Mensch</p>';
        } else {
            echo '<p>'.$mensch->getName().' ist kein Mensch</p>';
        }
        echo '<p>Der Vorfahre von '.$mensch->getName().' heisst '.$mensch->getVorfahre().'</p>';
        $mensch->neueEvolutionstheorie("Alien");
        echo '<p>Der Vorfahre von '.$mensch->getName().' heisst '.$mensch->getVorfahre().'</p>';

        $bankangestellter = new Schweizer("Tobias Muster","m");
        try {
            $bankangestellter->umbenennen("neuer name");
        } catch (Exception $e) {
            echo '<p>Exception abgefangen: ',  $e->getMessage(), "</p>";
        }
    }
}