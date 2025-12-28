<?php
require_once './src/Entity/Commande.php';
class CommandeRepository
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->connect;
    }

    public function save($commande)
    {
        $sql = "INSERT INTO commandes (montant_total, statut, client_id) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql);
        $montant = $commande->getMontant();
        $statut = $commande->getStatut();
        $clientId = $commande->getClient();
        $stmt->bind_param("dsi", $montant, $statut, $clientId);
        return $stmt->execute();
    }

    public function selectUnpaid()
    {
        $query = "SELECT * FROM commandes WHERE statut = 'EN_ATTENTE'";
        $res = $this->db->query($query);
        $commandes = [];
        while ($row = $res->fetch_assoc()) {
            $commande = new Commande($row['client_id'], $row['montant_total']);
            $commande->statut = $row['statut'];
            $commande->id = $row['id'];
            $commandes[] = $commande;
        }
        return $commandes;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM commandes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $commande = new Commande($row['client_id'], $row['montant_total']);
            $commande->statut = $row['statut'];
            $commande->id = $row['id'];
            return $commande;
        }
        return null;
    }

    public function updateStatut($id, $statut)
    {
        $sql = "UPDATE commandes SET statut = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $statut, $id);
        return $stmt->execute();
    }
    public function selectCommandes()
    {
        $query = "SELECT * FROM commandes WHERE 1 = 1";
        $res = $this->db->query($query);
        $commandes = [];
        while ($row = $res->fetch_assoc()) {
            $commande = new Commande($row['client_id'], $row['montant_total']);
            $commande->statut = $row['statut'];
            $commande->id = $row['id'];
            $commandes[] = $commande;
        }
        return $commandes;
    }
}
