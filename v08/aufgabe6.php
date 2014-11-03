<?php

class Aufgabe6{
    public function show(){
        ?>
        <h1>Aufgabe 6</h1>
        Ein Deadlock tritt auf, wenn sich zwei Tasks dauerhaft gegenseitig blockieren, weil jeder der Tasks eine Sperre für eine Ressource aufrecht erhält, die die anderen Tasks zu sperren versuchen. Die folgende Abbildung zeigt den Deadlockstatus auf hoher Ebene, wobei Folgendes gilt.
        <br/>- Task T1 erhält eine Sperre für Ressource R1 aufrecht (wird durch den Pfeil von R1 zu T1 angezeigt) und hat eine Sperre für Ressource R2 angefordert (wird durch den Pfeil von T1 zu R2 angezeigt).
        <br/>- Task T2 erhält eine Sperre für Ressource R2 aufrecht (wird durch den Pfeil von R2 zu T1 angezeigt) und hat eine Sperre für Ressource R1 angefordert (wird durch den Pfeil von T2 zu R1 angezeigt).
        <br/>- Da keiner der Tasks fortgesetzt werden kann, bevor eine Ressource verfügbar ist, und keine der Ressourcen freigegeben werden kann, bevor ein Task fortgesetzt wird, ist ein Deadlock vorhanden.
        <?
    }
}