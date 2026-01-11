<?php

namespace OOP2\lesclass;

require_once '../autoloding.php';

use OOP2\lesclass\Person;
use OOP2\InterfaceFolder\crud;
use PDO;
use OOP2\Databese;

$connection = databese::ConnexionDataBase();

class coatch extends Person implements crud
{
    public $Frais_de_déplacement;
    public $Salaire_mensuel = 12;
    public ?PDO $connection = null;
    private ?int $equipe_idA;
    private ?int $Salaire;
    private ?int $equipe_idB;
    // $connection,$name,$nationalite,$email,$equipe_idA,$Salaire
    public function __construct(?PDO $connection = null, ?string $name = null, ?string $nationalite = null, ?string $email = null, ?int $equipe_idA = null, ?int $Salaire = null, ?int $id = null, ?int $equipe_idB = null)
    {
        parent::__construct($name, $id, $email, $nationalite);
        $this->connection = $connection;
        $this->equipe_idA = $equipe_idA;
        $this->Salaire = $Salaire;
        $this->equipe_idB = $equipe_idB;
    }


    public function getConnection()
    {
        return $this->connection;
    }


    public function setConnection($connection)
    {
        $this->connection = $connection;
    }


    // public function getId()
    // {
    //     return $this->id;
    // }

    // public function setId($id)
    // {


    //     return $this->id;
    // }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {

        return $this->name;
    }


    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function setNationalite($nationalite)
    {

        return $this->nationalite;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {


        return $this->email;
    }

    // public function getEquipe_idA()
    // {
    //     return $this->equipe_idA;
    // }


    // public function setEquipe_idA($equipe_idA)
    // {


    //     return $this->$equipe_idA;
    // }





    public function getAnnualCost()
    {
        return ($this->Salaire_mensuel * 12) + $this->Frais_de_déplacement;
    }


    public function getnaneEquipe(): array
    {
        $connection = $this->connection;

        $ss = "SELECT id,name FROM equipe";
        $resultE2 = $connection->query($ss);
        return $resultE2->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function __construct(
    // ?PDO $connection = null,
    // ?int $id = null,
    // ?string $name = null,
    // ?string $nationalite = null,
    // ?string $email = null,
    // ?int $equipe_idA = null,
    // ?int $Salaire = null





    public function Ajouter()
    {
        $connection = $this->connection;
        $name = $this->name;
        $email = $this->email;
        $nationalite = $this->nationalite;
        $equipe_idA = $this->equipe_idA;
        $Salaire = $this->Salaire;
        $sql = "INSERT INTO coatch(name,email,nationalite,equipe_idA,Salaire) VALUES(:name,:email,:nationalite,:equipe_idA,:Salaire)";
        $prepare = $connection->prepare($sql);
        $prepare->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':nationalite' => $nationalite,
            ':equipe_idA' => intval($equipe_idA),
            ':Salaire' => intval($Salaire)
        ));
        $coatch_id = $connection->lastInsertId();
        $newcontrat = new conrat($connection, null, $coatch_id, $Salaire, $equipe_idA);
        $newcontrat->Ajouter();
    }
    public function modifier()
    {
        $id = $this->id;
        $connection = $this->connection;
        $name = $this->name;
        $email = $this->email;
        $nationalite = $this->nationalite;
        $equipe_idA = $this->equipe_idA;

        $sql = "UPDATE coatch SET name=:name,email=:email,nationalite=:nationalite,equipe_idA=:equipe_idA WHERE id = :id";
        $prepar = $connection->prepare($sql);
        $prepar->execute([
            ':name' => $name,
            ':email' => $email,
            ':nationalite' => $nationalite,
            ':equipe_idA' => $equipe_idA,
            ':id' => $id

        ]);
    }
    public function delete(): bool
    {
        $id = $this->id;
        $connection = $this->connection;
        $sql = "DELETE FROM coatch WHERE id =$id";
        $prepere = $connection->prepare($sql);
        return $prepere->execute();
    }


    public function afficher(): array
    {
        $connection = $this->connection;
        $sql = "SELECT * FROM coatch";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function  updatecoatchTransfer($connection, $equipe_idA, $coatch_id)
    {
        $sql = "UPDATE `coatch` SET equipe_idA=:equipe_idA WHERE id =:id";
        $prepare = $connection->prepare($sql);
        $a = $prepare->execute([
            ':equipe_idA' => $equipe_idA,
            ':id' => $coatch_id
        ]);
        echo $a;
        if ($prepare) {
            return true;
        }
    }



    public static function getbedgetequipecoatch($connection, $id_coatch)
    {
        $sql = "SELECT `equipe_idA` FROM `coatch` WHERE id =:id_coatch ";
        $pre = $connection->prepare($sql);
        $pre->execute([
            ':id_coatch' => $id_coatch
        ]);
        $res=$pre->fetch(PDO::FETCH_ASSOC);

        return $res['equipe_idA'];
    }
    public static function getbedgetwhereequipe($connection, $equipe_idA)
    {
        $sql = "SELECT badget FROM equipe WHERE id = :equipe_idA";
        $prepare = $connection->prepare($sql);
        $prepare->execute([
            ':equipe_idA' => $equipe_idA
        ]);
        $ret = $prepare->fetch(PDO::FETCH_ASSOC);
        return $ret;
    }
    

}
