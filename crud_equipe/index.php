<?php
include "../databese.php";
// include_once "../equipe.php";
include_once "../trait.php";

class equipe
{
    use Crd;
    private ?string $name;
    private ?string $manager_name;
    private ?string $badget;
    public $connection;

    function __construct($name, $manager_name, $badget, $connection)
    {
        $this->connection = $connection;
        $this->name = $name;
        $this->manager_name = $manager_name;
        $this->badget = $badget;
    }

    // public function getname()
    // {
    //     return $this->name;
    // }
    // public function setname($name)
    // {
    //     $this->name = $name;
    // }

    // public function getmanager_name()
    // {
    //     return $this->manager_name;
    // }
    // public function setmanager_name($manager_name)
    // {
    //     $this->manager_name = $manager_name;
    // }

    // public function getbadget()
    // {
    //     return $this->badget;
    // }
    // public function setbadget($badget)
    // {
    //     $this->badget = $badget;
    // }



    public function Ajouter()
    {
        $sql = "INSERT INTO equipe(name,manager_name,badget) VALUES(:name,:manager_name,:badget)";
        $prepare = $this->connection->prepare($sql);
        $prepare->execute(array(
            ':name' => $this->name,
            ':manager_name' => $this->manager_name,
            ':badget' => $this->badget
        ));
    }
    public function getAll() {
        return $this->afficher('equipe', $this->connection);
    }
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    echo $name;
    $manager_name = $_POST['manager_name'];
    $badget = $_POST['badget'];
    $newequipe = new equipe($name, $manager_name, $badget, $connection);
    $newequipe->Ajouter();


    header("Location:afficher_Equipe.php");
}