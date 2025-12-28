<?php

abstract class Paiement
{
    protected $id;
    protected $montant;
    protected $statut;
    protected $datePaiement;
    protected $commandeId;

    public function __construct($montant, $commandeId, $statut = 'En attente', $datePaiement = null)
    {
        $this->montant = $montant;
        $this->commandeId = $commandeId;
        $this->statut = $statut;
        $this->datePaiement = $datePaiement;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getDatePaiement()
    {
        return $this->datePaiement;
    }

    public function getCommandeId()
    {
        return $this->commandeId;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setDatePaiement($date)
    {
        $this->datePaiement = $date;
    }

    abstract public function payer();
}
