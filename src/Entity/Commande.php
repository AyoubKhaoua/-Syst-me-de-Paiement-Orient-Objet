<?php
class Commande
{
    //ATTRIBUTE
    private $clientId;
    private $montantTotal;

    //methodes
    public function __construct($clientId, $montantTotal, public $statut = 'en_attent')
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
}
