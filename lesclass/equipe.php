<?php

namespace OOP2\lesclass;

use OOP2\InterfaceFolder\crud;
use PDO;

class equipe implements crud
{
    public $id;
    public ?string $name;
    public ?string $manager_name;
    public ?int $badget;
    public PDO $connection;


    public function __construct(PDO $connection, ?string $name = null, ?string $manager_name = null, ?string $badget = null, ?int $id = null)
    {
        $this->connection = $connection;
        $this->id = $id;
        $this->name = $name;
        $this->manager_name = $manager_name;
        $this->badget = $badget;
    }

    //         public function getconnection()
    // {
    //     return $this->connection;
    // }
    // public function setconnection($connection)
    // {
    //     $this->connection = $connection;
    // }

    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;
    }

    public function getname()
    {
        return $this->name;
    }
    public function setname($name)
    {
        $this->name = $name;
    }

    public function getmanager_name()
    {
        return $this->manager_name;
    }
    public function setmanager_name($manager_name)
    {
        $this->manager_name = $manager_name;
    }

    public function getbadget()
    {
        return $this->badget;
    }
    public function setbadget($badget)
    {
        $this->badget = $badget;
    }



    public function Ajouter()
    {

        $name = $this->name;
        $manager_name = $this->manager_name;
        $badget = $this->badget;
        $connection = $this->connection;
        $sql = "INSERT INTO equipe(name,manager_name,badget) VALUES(:name,:manager_name,:badget)";
        $prepare = $connection->prepare($sql);
        $tchec = $prepare->execute(array(
            ':name' => $name,
            ':manager_name' => $manager_name,
            ':badget' => $badget
        ));
    }

    public function modoferbadget($id, $badget, $connection)
    {
        $sql = "UPDATE equipe SET badget=:badget WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':badget' => $badget
        ]);
    }




    public function modifier(): bool
    {
        $name = $this->name;
        $manager_name = $this->manager_name;
        $badget = $this->badget;
        $connection = $this->connection;
        $id = $this->id;
        $sql = "UPDATE equipe SET name =:name,manager_name=:manager_name,badget=:badget WHERE id = :id";
        $prepar = $connection->prepare($sql);
        $preparr = $prepar->execute([
            ':name' => $name,
            ':manager_name' => $manager_name,
            ':badget' => $badget,
            ':id' => $id
        ]);
        return $preparr;
    }




    public function delete(): bool
    {
        $id = $this->id;
        $connection = $this->connection;
        $sql = " DELETE FROM equipe WHERE id =:id";
        $prepere = $connection->prepare($sql);
        return $prepere->execute([
            ':id' => $id
        ]);
    }

    public function afficher(): array
    {
        $connection = $this->connection;
        $sql = "SELECT * FROM equipe";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetDatadeUpdate()
    {
        $connection = $this->connection;
        $id = $this->id;
        $F = $connection->prepare("SELECT * FROM equipe WHERE id = :id");
        $F->execute([':id' => $id]);
        return $F;
    }
    public static function getbedgetequipe($connection, $Joueur_id): array
    {
        $sql = "SELECT badget FROM `equipe` WHERE id = :Joueur_id";
        $pre = $connection->prepare($sql);
        $pre->execute([
            ':Joueur_id' => $Joueur_id
        ]);
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    public static function getidjoueur($connection, $name)
    {
        $sql = "SELECT id FROM equipe WHERE name = :name";
        $res = $connection->prepare($sql);
        $res->execute([
            ':name' => $name
        ]);
        $fetc =  $res->fetch(PDO::FETCH_ASSOC);
        return $fetc['equipe_idA'];
    }

    public static function getequipe_idADEjoueur($connection, $Joueur_id)
    {
        $sql = "SELECT equipe_idA FROM joueur WHERE id = $Joueur_id";
        $res = $connection->query($sql);
        $resfetch = $res->fetchAll(PDO::FETCH_ASSOC);
        return $resfetch;
    }


















    public static function getbedjetequipeB($connection, $equipe_idB): array
    {
        $sql = "SELECT badget FROM `equipe` WHERE id = :equipe_idB";
        $prepare = $connection->prepare($sql);
        $prepare->execute([
            ':equipe_idB' => $equipe_idB
        ]);
        return $prepare->fetch(PDO::FETCH_ASSOC);
    }


























    // public static function comprerbudgetANDmontant($bedgetd,$montantJoueur){



    // }






}
