<?php

class Aufgabe7{
    public function show(){
        ?>
        <h1>Aufgabe 7</h1>
        Der Non-Repeatable-Read kann dadurch eingedämmt werden, da nach der ID und Version gesucht werden kann. So kann der Programmierer kurz vor dem Update eines Datensatztes einen anderen Datensatzt in einer anderen Tabelle auf seine "Aktualität" überprüfen.
        Lost-Update kann dadurch verhindert werden, da nur dann ein Update ausgeführt wird wenn sich die Version nicht verändert hat.        <?
    }
}