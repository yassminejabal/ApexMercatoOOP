<?php
namespace OOP2;

final class FinancialEngine{
    private static float  $commision;
    private static float $sevabilete;
    private  static float $taxe = 0.05;
    private static float $Total;
    
    public static function functionFinalEngine($badget_equipeB,$montant_transfert) {
        self::$commision = $montant_transfert/2;
        self::$Total = ($montant_transfert+self::$commision) * self::$taxe;
        self::$sevabilete = $badget_equipeB - self::$Total;
        if(self::$sevabilete>=0){
            return self::$Total;
        }
        else{
            return false;
        }
    }
}
?>