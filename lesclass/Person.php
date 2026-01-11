<?php
namespace OOP2\lesclass;
abstract class Person{

    public function __construct(protected ?string $name = null,protected ?int $id = null, protected ?string $email=null,protected ?string $nationalite=null) {
        $this->id =$id;
        $this->name =$name;
        $this->email =$email;
        $this->nationalite =$nationalite;
    }
    







}