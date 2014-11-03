<?php
abstract class Lebewesen{
    protected $alter;
    abstract public function altern();

    public function getAlter(){
        return $this->alter;
    }
}
?>