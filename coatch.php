<?php
include_once "conrat.php";
class coatch extends Person{
    public $Frais_de_déplacement = 234;
    public $Salaire_mensuel = 12;
    public int $id_contract;
        public function __construct($id, $name, $nationalite, $email,$role)
    {
         parent::__construct($id, $name, $nationalite, $email);
    }
       public function getAnnualCost(){
        return ($this->Salaire_mensuel*12) + $this->Frais_de_déplacement;
    }
    
}


?>
