<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelCertificados
{
    private $conn;

    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
    }

    public function listaCertificados()
    {
        try{
            $stmt = $this->conn->query("SELECT * FROM certificado;");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }

    public function cadastraCertificados($o)
    {

    }

}
