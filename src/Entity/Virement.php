<?php
require_once './src/Entity/Paiement.php';

class Virement extends Paiement
{
    private $montantTransfert;

    public function __construct($montant, $commandeId, $montantTransfert)
    {
        parent::__construct($montant, $commandeId);
        $this->montantTransfert = $montantTransfert;
    }

    public function getMontantTransfert()
    {
        return $this->montantTransfert;
    }

    public function payer()
    {
        $this->setStatut('En attente');
        $this->setDatePaiement(date('Y-m-d'));
        return true;
    }
}
