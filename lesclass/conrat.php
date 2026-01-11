<?php
namespace OOP2\lesclass;

use DateTime;
use PDO;
use OOP2\Databese;
databese::ConnexionDataBase();
class conrat
{
    // private int $id;
    // private ?int $joueur_id = null;
    // private ?int $coach_id = null;
    // private int $date;
    // private int $montant;
    // private int $equipe_idA;
    // private PDO $connection;

    public function __construct(
    private PDO $connection,private ?int $joueur_id = null,private ?int $coatch_id = null,private ?int $Salaire = null,private ?int $equipe_idA = null)
    {
        $this->connection = $connection;
        // $this->id = $id;
        $this->joueur_id = $joueur_id;
        $this->coatch_id = $coatch_id;
        // $this->date = $date;
        $this->Salaire = $Salaire;
        $this->equipe_idA = $equipe_idA;
    }

    // GET
    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function setId($id)
    // {
    //     $this->id = $id;
    //     return $this;
    // }

    public function getJoueurId()
    {
        return $this->joueur_id;
    }

    public function setJoueurId($joueur_id)
    {
        $this->joueur_id = $joueur_id;
    }

    public function getCoachId()
    {
        return $this->coatch_id;
    }

    public function setCoachId($coatch_id)
    {
        $this->coatch_id = $coatch_id;
    }

    // public function getDate()
    // {
    //     return $this->date;
    // }

    // public function setDate($date)
    // {
    //     $this->date = $date;
    // }

    public function getMontant()
    {
        return $this->Salaire;
    }

    public function setMontant($Salaire)
    {
        $this->Salaire = $Salaire;
    }

    public function getEquipeIdA()
    {
        return $this->equipe_idA;
    }

    public function setEquipeIdB($equipe_idA)
    {
        $this->equipe_idA = $equipe_idA;
    }

    public function Ajouter(? DateTime $newDateTime = null)
    {
        $sql = "INSERT INTO conrat(joueur_id, coatch_id, montant, equipe_idA,datefin) VALUES(:joueur_id, :coatch_id, :montant, :equipe_idA,:datefin)";
        $prepare = $this->connection->prepare($sql);
         $re = $prepare->execute([
            ':joueur_id' => $this->joueur_id,
            ':coatch_id' => $this->coatch_id,
            ':montant' => $this->Salaire,
            ':equipe_idA' => $this->equipe_idA,
            ':datefin' => $newDateTime->format('Y-m-d H:i:s')
        ]);
        return $re;
    }
}