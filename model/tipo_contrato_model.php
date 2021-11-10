<?php
include_once '../database/config.php';

class TipoContrato extends config
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

    public function add($nome_tipo_contrato, $cod_tipo_contrato, $meses, $valor, $valor_pos, $obs)
    {
        $sql = "INSERT INTO tipo_contrato( nome_tipo_contrato, cod_tipo_contrato, meses, valor, valor_pos, obs) VALUES  (?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_tipo_contrato, $cod_tipo_contrato, $meses, $valor, $valor_pos, $obs]);
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
    }


    public function edit($id_tipo_contrato,$nome_tipo_contrato, $cod_tipo_contrato, $meses, $valor, $valor_pos, $obs)
    {   
        $sql = "UPDATE tipo_contrato SET nome_tipo_contrato = ?, cod_tipo_contrato = ?, meses = ?, valor = ?, valor_pos = ?, obs = ?  WHERE id_tipo_contrato = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $nome_tipo_contrato, $cod_tipo_contrato, $meses, $valor, $valor_pos, $obs, $id_tipo_contrato]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
    }

    public function del($id_tipo_contrato)
    {   //echo $id_tipo_contrato;
        $sql = "DELETE FROM tipo_contrato WHERE id_tipo_contrato = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_tipo_contrato]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
    }

}
