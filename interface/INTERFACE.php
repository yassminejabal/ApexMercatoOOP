<?php
interface crud{
    public function Ajouter();
    public function modifier();
    public function delete():bool;
    public function afficher():array;
}