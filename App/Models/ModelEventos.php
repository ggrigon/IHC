<?php

namespace App\Models;

use src\ServiceDB\ConnectDB;

class ModelEventos
{
    private $conn;

    public function __construct()
    {
        $conn = new ConnectDB();
        $this->conn = $conn->getConn();
    }

    public function listaEventos()
    {
        try{
            $stmt = $this->conn->query("SELECT * FROM evento;");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser enviadas\n".$e->getMessage();
        }
    }

    public function cadastraEvento($o)
    {
        try{

            if (empty($o->cod_certificado)){
              $stmt = $this->conn->prepare("INSERT INTO evento (desc_evento, data_ini, data_fim, valor, cidade, desc_local) VALUES (:desc_evento, :data_ini, :data_fim, :valor, :cidade, :desc_local);");

              echo "Cadastro nao possui certificado!\n";
            } else {
              $stmt = $this->conn->prepare("INSERT INTO evento (cod_certificado, desc_evento, data_ini, data_fim, valor, cidade, desc_local) VALUES (:cod_certificado, :desc_evento, :data_ini, :data_fim, :valor, :cidade, :desc_local);");
              $stmt->bindValue(":cod_certificado", $o->cod_certificado);

              echo "Cadastro possui certificado!\n";
            }

            echo "Certificado = ".$o->cod_certificado."\n";

            $stmt->bindValue(":desc_evento", $o->desc_evento);
            $stmt->bindValue(":data_ini", $o->data_ini);
            $stmt->bindValue(":data_fim", $o->data_fim);
            $stmt->bindValue(":valor", $o->valor);
            $stmt->bindValue(":cidade", $o->cidade);
            $stmt->bindValue(":desc_local", $o->desc_local);
            $stmt->execute();

            echo "As informaçoes foram gravadas com sucesso";

        } catch(Exception $e){
            echo "Erro, as informacoes nao puderam ser gravadas\n".$e->getMessage();
        }

    }

}
