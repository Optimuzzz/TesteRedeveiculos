<?php
include_once '../database/config.php';

class Contrato extends config
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->usuario, $this->senha);
    }

    public function listContrato()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tipo_contrato ORDER BY id_tipo_contrato DESC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $rs;
        
    }

    public function listClientes()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM cliente ");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $rs;
        
    }

}
