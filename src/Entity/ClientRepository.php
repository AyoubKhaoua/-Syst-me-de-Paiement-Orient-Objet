<?php class ClientRepository
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->connect;
    }

    public function save($client)
    {
        $sql = "insert into  clients (nom, email) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        $nom = $client->getNom();
        $email = $client->getEmail();
        $stmt->bind_param(
            "ss",
            $nom,
            $email
        );
        return $stmt->execute();
    }
}
