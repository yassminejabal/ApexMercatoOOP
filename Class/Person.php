<?php
abstract class Person{
    public function __construct(protected ?int $id = null,protected ?string $name = null, protected ?string $email=null,protected ?string $nationalete=null) {
        $this->id =$id;
        $this->name =$name;
        $this->email =$email;
        $this->nationalete =$nationalete;
    }
    







}