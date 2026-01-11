<?php

namespace OOP2\lesclass;

use DateTime;
use Exception;
use OOP2\Databese;
use OOP2\FinancialEngine;
use OOP2\lesclass;
use OOP2\lesclass\equipe;
use OOP2\lesclass\conrat;
use PDO;
// use OOP2\
$connection = databese::ConnexionDataBase();

class transfert
{
    function getlesequipe($connection)
    {
        $ss = "SELECT id,name FROM equipe";
        $resultE2 = $connection->query($ss);
        return $resultE2;
    }
    function getlesjoueur($connection)
    {
        $sql = "SELECT id,name FROM joueur";
        $resultJ = $connection->query($sql);
        return $resultJ;
    }

    public static function transaction($connection, int $equipe_idA, int $equipe_idB, int $Joueur_id, float $badget_equipeA, float $badget_equipeB, float $montant_transfert)

    {
        try {
            $connection->beginTransaction();
            $badget_equipe = equipe::getbedgetequipe($connection, $Joueur_id);
            var_dump($badget_equipe);
            $ret = FinancialEngine::functionFinalEngine($badget_equipeB, $montant_transfert);
            // var_dump($ret);
            if ($ret) {
                transfert::createTrnsfere($connection, $equipe_idA, $equipe_idB, $Joueur_id, $montant_transfert);
                self::modifierbedget($connection, $badget_equipeA, $badget_equipeB, $montant_transfert);
                joueur::updatejoueurTransfer($connection, $equipe_idB, $Joueur_id);
                $newconrat = new conrat($connection,$Joueur_id,$montant_transfert,$equipe_idA);
                $newDateTime=(new DateTime());
                $newconrat->Ajouter($newDateTime);
            }
            $connection->commit();

        } catch (Exception $th) {
            $connection->rollBack();
            echo  "un error dans crud transfer" . $th->getMessage();
        }
    }

    
    public static function transactioncoatch($connection, int $equipe_idA_coatch, int $equipe_idB_coatch, int $id_coatch, int $badget_equipeA, int $badget_equipeB, int $montant_transfert)
    {
        try {
            $connection->beginTransaction();

            $badget_equipeB = equipe::getbedjetequipeB($connection,$equipe_idB_coatch);
            $badget_equipeB = $badget_equipeB['badget'];

            $ret = FinancialEngine::functionFinalEngine($badget_equipeB, $montant_transfert);
            // var_dump($ret);
            if ($ret) {

                
                $r = transfert::createTrnsferecoatch($connection, $equipe_idA_coatch, $equipe_idB_coatch, $id_coatch, $montant_transfert);
                echo "<br>";
                echo "<br>";
                $ret = self::modifierbedget($connection, $badget_equipeA, $badget_equipeB, $montant_transfert);
                echo "<br>";
                $newconrat = new conrat($connection,$id_coatch,$montant_transfert,$equipe_idA_coatch);
                $newDateTime=(new DateTime());
                $e = $newconrat->Ajouter($newDateTime);
                var_dump($e);
                echo "<br>";
                echo "<br>";
                
                coatch::updatecoatchTransfer($connection, $equipe_idA_coatch, $id_coatch);
                
            }
            if($connection->commit()){
                return "yess";
            }
        } catch (Exception $th) {
            $connection->rollBack();
            echo $th;
        }
    }






    public static function getidnamedeselectJoueur($connection)
    {
        $sql = "SELECT id,name FROM joueur";
        $resultJ = $connection->query($sql);
        return $resultJ;
    }

    public static function getidnamedeselectequipe($connection)
    {
        $ss = "SELECT id,name FROM equipe";
        $resultE2 = $connection->query($ss);
        return $resultE2;
    }

    public static function createTrnsfere($connection, $equipe_idA, $equipe_idB, $Joueur_id, $montant_transfert)
    {
        $sqll = "INSERT INTO transfert(equipe_idA,Joueur_id,montant_transfert,equipe_idB) VALUES(:equipe_idA,:Joueur_id,:montant_transfert,:equipe_idB)";
        $stmt = $connection->prepare($sqll);  
        $t =$stmt->execute([
            ':equipe_idA' => $equipe_idA,
            ':equipe_idB' => $equipe_idB,
            ':Joueur_id' => $Joueur_id,
            ':montant_transfert' => $montant_transfert
        ]);
        return $t;
    }
        public static function createTrnsferecoatch($connection, $equipe_idA_coatch, $equipe_idB_coatch, $id_coatch, $montant_transfert)
    {
       
        $sqll = "INSERT INTO transfert(equipe_idA,coatch_id,montant_transfert,equipe_idB) VALUES(:equipe_idA_coatch,:coatch_id,:montant_transfert,:equipe_idB_coatch)";
        $stmt = $connection->prepare($sqll); 
        $stmt->execute([
            ':equipe_idA_coatch' => $equipe_idA_coatch,
            ':coatch_id' => $id_coatch,
            ':montant_transfert' => $montant_transfert,
            ':equipe_idB_coatch' => $equipe_idB_coatch
        ]);
        
        }
    public static function modifierbedget($connection, $equipe_idA, $equipe_idB, $montant_transfert)
    {
        $sql = "UPDATE `equipe` SET badget = badget+:montant_transfert WHERE id = :equipe_idA";
        $prepare = $connection->prepare($sql);
         $prepare->execute([
            ':montant_transfert' => $montant_transfert,
            ':equipe_idA' => $equipe_idA

        ]);

        $sqll = "UPDATE equipe SET badget =  badget-:montant_transfert WHERE id = :equipe_idB";
        $pre = $connection->prepare($sqll);
        $pre->execute([
            ':montant_transfert' => $montant_transfert,
            ':equipe_idB' => $equipe_idB

        ]);
        
    }
    public static function getnameequipeIDCOATCH($connection,$id){
        $ss = "SELECT equipe_idA,name FROM coatch WHERE id = $id";
        $resultE2 = $connection->query($ss);
        return $resultE2->fetch(PDO::FETCH_ASSOC);
    } 
}




    
//https://wayground.com/join/game/U2FsdGVkX1%252F79v3JiIwGPI4DrH8LniwjoFPnb6lz5q0w4nXl5kRA3Y2AgJDrfvSiKUdNz7jRA3UFb%252FwmFiu%252FZA%253D%253D?page=summary




