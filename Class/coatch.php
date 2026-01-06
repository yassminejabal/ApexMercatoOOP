<?php
include_once "../trait.php";
include_once "Person.php";
include_once "../databese.php";
include_once "../interface/INTERFACE.php";
class coatch extends Person implements crud
{
    public $Frais_de_déplacement;
    public $Salaire_mensuel = 12;
    public PDO $connection;
    private ?int $equipe_idA;
    private ?int $Salaire;

    public function __construct($connection, ?int $id = null, ?string $name = null, ?string $nationalete = null, ?string $email = null, ?int $equipe_idA = null, ?int $Salaire = null)
    {
        parent::__construct($id, $name, $nationalete, $email);
        $this->connection = $connection;
        $this->equipe_idA = $equipe_idA;
        $this->Salaire = $Salaire;
        
    }


    public function getConnection()
    {
        return $this->connection;
    }


    public function setConnection($connection)
    {
        $this->connection = $connection;

        
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {


        return $this->id;
    }


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
        return $this->nationalete;
    }

    public function setNationalite($nationalete)
    {

        return $this->nationalete;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {


        return $this->email;
    }

    public function getEquipe_idA()
    {
        return $this->equipe_idA;
    }


    public function setEquipe_idA($equipe_idA)
    {


        return $this->$equipe_idA;
    }





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





    public function Ajouter()
    {
        $connection = $this->connection;
        $name = $this->name;
        $email = $this->email;
        $nationalite = $this->nationalete;
        $equipe_idA = $this->equipe_idA;

        $sql = "INSERT INTO coatch(name,email,nationalite,equipe_idA) VALUES(:name,:email,:nationalite,:equipe_idA)";
        $prepare = $connection->prepare($sql);
        $prepare->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':nationalite' => $nationalite,
            ':equipe_idA' => $equipe_idA

        ));
       
    }
    public function modifier()
    {
        $id = $this->id;
        $connection = $this->connection;
        $name = $this->name;
        $email = $this->email;
        $nationalite = $this->nationalete;
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
}
//id	name	email	nationalite	equipe_idA


        // $this->id =$id;
        // $this->name =$name;
        // $this->email =$email;
        // $this->nationalete =$nationalete;


        

    // public function setid_contract($id_contract)
    // {

    //     $this->id_contract = $id_contract;
    // }
        //     public function getid_contract()
    // {
    //     return $this->id_contract;
    // }