<?php
class Commande
{
    //ATTRIBUTE
    public $id = null;
    private $clientId;
    private $montantTotal;
    public $statut = "EN_ATTENTE";

    //methodes
    public function __construct($clientId, $montantTotal)
    {
        $this->clientId = $clientId;
        $this->montantTotal = $montantTotal;
    }
    public function getClient()
    {
        return $this->clientId;
    }
    public function getMontant()
    {
        return $this->montantTotal;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    public function getId()
    {
        return $this->id;
    }
}
