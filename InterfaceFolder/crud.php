<?php
namespace OOP2\InterfaceFolder;

interface crud{
    public function Ajouter();
    public function modifier();
    public function delete():bool;
    public function afficher():array;
}