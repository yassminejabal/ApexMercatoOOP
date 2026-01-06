<?php
class conrat
{
    private $id;
    private $joueur_id;
    private $coach_id;
    private $date;
    private $montant;
    private $equipe_idB;

    public function __construct($joueur_id, $coach_id, $date, $montant, $equipe_idB)
    {
        $this->joueur_id = $joueur_id;
        $this->coach_id = $coach_id;
        $this->date = $date;
        $this->montant = $montant;
        $this->equipe_idB = $equipe_idB;
    }

    // GET
    public function getId() {
        return $this->id;
    }

    public function getJoueurId() {
        return $this->joueur_id;
    }

    public function getCoachId() {
        return $this->coach_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getEquipeIdB() {
        return $this->equipe_idB;
    }

    // SET
    public function setId($id) {
        $this->id = $id;
    }

    public function setJoueurId($joueur_id) {
        $this->joueur_id = $joueur_id;
    }

    public function setCoachId($coach_id) {
        $this->coach_id = $coach_id;
    }

    // public function setDate($date) {
    //     $this->date = $date;
    // }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function setEquipeIdB($equipe_idB) {
        $this->equipe_idB = $equipe_idB;
    }
}


