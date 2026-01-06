<?php
include_once "../interface/INTERFACE.php";
include_once "Person.php";
include "../databese.php";


class joueur extends Person implements crud
{
    public function __construct(protected ?PDO $connection, protected ?int $id = null, protected ?string $name = null, protected ?string $email = null, protected ?string $role = null, protected ?string $nationalete = null, protected ?int $equipe_id = null, protected ?int $valeur_marcher = null, protected ?int $Salaire = null)
    {
        parent::__construct($id, $name, $email, $nationalete);
        $this->connection = $connection;
        $this->role = $role;
        $this->equipe_id = $equipe_id;
        $this->Salaire = $Salaire;
        $this->valeur_marcher = $valeur_marcher;
    }
    // SET
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setNationalite($nationalite)
    {
        $this->nationalete = $nationalite;
    }
    public function setEquipeIdA($equipe_id)
    {
        $this->equipe_id = $equipe_id;
    }
    public function setValeurMarcher($valeur_marcher)
    {
        $this->valeur_marcher = $valeur_marcher;
    }
    public function setSalaire($Salaire)
    {
        $this->Salaire = $Salaire;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    // GET
    public function getConnection()
    {
        return $this->connection;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getNationalite()
    {
        return $this->nationalete;
    }
    public function getEquipeIdA()
    {
        return $this->equipe_id;
    }
    public function getValeurMarcher()
    {
        return $this->valeur_marcher;
    }

    public function getSalaire()
    {
        return $this->Salaire;
    }
    public function getId()
    {
        return $this->id;
    }

    public function Ajouter()
    {
        $connection = $this->connection;
        $name = $this->name;
        $role = $this->role;
        $email = $this->email;
        $nationalite = $this->nationalete;
        $equipe_idA = $this->equipe_id;
        $valeur_marcher = $this->valeur_marcher;
        $Salaire = $this->Salaire;

        $sql = "INSERT INTO joueur(name,role,email,nationalite,equipe_idA,valeur_marcher,Salaire) VALUES(:name,:role,:email,:nationalite,:equipe_idA,:valeur_marcher,:Salaire)";
        $prepare = $connection->prepare($sql);
        $prepare->execute(array(
            ':name' => $name,
            ':role' => $role,
            ':email' => $email,
            ':nationalite' => $nationalite,
            ':equipe_idA' => $equipe_idA,
            ':valeur_marcher' => $valeur_marcher,
            ':Salaire' => $Salaire
        ));
    }

    public function modifier()
    {
        $equipe_idA = $this->equipe_id;
        $name = $this->name;
        $role = $this->role;
        $email = $this->email;
        $valeur_marcher = $this->nationalete;
        $equipe_id = $this->equipe_id;
        $valeur_marcher = $this->valeur_marcher;
        $Salaire = $this->Salaire;
        $id = $this->id;
        $sql = "UPDATE joueur SET name=:name,role=:role,email=:email,valeur_marcher=:valeur_marcher,Salaire=:Salaire,equipe_idA=:equipe_idA WHERE id = :id";
        $prepar = $this->connection->prepare($sql);
        $prepar->execute([
            ':name' => $name,
            ':role' => $role,
            ':email' => $email,
            ':valeur_marcher' => $valeur_marcher,
            ':Salaire' => $Salaire,
            ':id' => $id,
            ':equipe_idA' => $equipe_idA

        ]);
    }
    public function delete(): bool
    {
        $id = $this->id;
        $connection = $this->connection;
        $sql = "DELETE FROM joueur WHERE id =$id";
        $prepere = $connection->prepare($sql);
        return $prepere->execute();
    }
    public function afficher(): array
    {
        $connection = $this->connection;
        $sql = "SELECT * FROM joueur";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    public function afficherDACHBORD(){
         $sql = "SELECT joueur.name as joueur_name,equipe.name as equipe_name,joueur.Salaire as joueur_Salaire,equipe.badget as equipe_badget FROM joueur LEFT JOIN equipe ON equipe.id = joueur.equipe_idA";
        $data = $this->connection->query($sql);
        foreach ($data as $row) { ?>
          <tr>
            <td><?= $row['joueur_name'] ?></td>
            <td><?= $row['equipe_name'] ?></td>
            <td><?= $row['joueur_Salaire'] ?></td>
            <td><?= $row['equipe_badget'] ?></td>
            <td><button>Modifier</button></td>
          </tr>

        <?php }
    }















    //   public function getAnnualCost()
    //   {
    //     return ($this->Salaire_mensuel * 12) + $this->Prime_de_signature;
    //   }
}
