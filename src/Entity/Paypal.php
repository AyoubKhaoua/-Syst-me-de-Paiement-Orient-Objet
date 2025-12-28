<?php
require_once './src/Entity/Paiement.php';

class Paypal extends Paiement
{
    private $idPaypal;

    public function __construct($montant, $commandeId, $idPaypal)
    {
        parent::__construct($montant, $commandeId);
        $this->idPaypal = $idPaypal;
    }

    public function getIdPaypal()
    {
        return $this->idPaypal;
    }

    public function payer()
    {
        // implémentation simple : marquer comme en attente et définir la date
        $this->setStatut('En attente');
        $this->setDatePaiement(date('Y-m-d'));
        return true;
    }
}
