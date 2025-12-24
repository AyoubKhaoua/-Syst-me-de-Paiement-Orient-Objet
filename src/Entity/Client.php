<?php
class  Client
{
    //ATTRIBUTE

    private $nom;
    private $email;
    //METHODES 
    public function __construct($nom, $email)
    {
        $this->nom = $nom;
        $this->email = $email;
    }
    public function __toString()
    {
        return 'ur name is ' . $this->nom . ',and ur email:' . $this->email;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
