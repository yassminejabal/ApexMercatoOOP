<?php
abstract class Person{
    public function __construct(protected int $id,protected string $name, protected string $email,protected $nationalete,protected $equipe_id)
    {


    }
    abstract public function getAnnualCost();
}





?>