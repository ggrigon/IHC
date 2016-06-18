<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();


$conn->query("INSERT INTO aluno (nr_matricula, cpf, nome, telefone) VALUES (32944, '035872300050', 'Lorenzo Freitas', '81675672');");
$conn->query("INSERT INTO secretaria (cpf, nome, telefone) VALUES ('035872300050', 'Bruna Silva', '81675672');");
$conn->query("INSERT INTO professor (cpf, nome, telefone) VALUES ('035872300050', 'Gnomo', '81675672');");
$conn->query("INSERT INTO certificado (inst_emissora, descricao, qtd_horas, data_emissao) VALUES ('Fisl15', 'evento qualquer', 20, '17062016');");
$conn->query("INSERT INTO entrega (cod_aluno, cod_secretaria, cod_certificado, data_entrega_cert) VALUES (1, 1, 1, '17062016');");
$conn->query("INSERT INTO evento (cod_certificado, desc_evento, data_ini, data_fim, valor, cidade, desc_local) VALUES (1, 'evento merda', '17062016', '18062016', 50.00, 'porto alegre', 'URGS');");
$conn->query("INSERT INTO evento_aluno (cod_evento, cod_aluno) VALUES (1, 1);");
$conn->query("INSERT INTO evento_professor (cod_evento, cod_professor) VALUES (1, 1);");

?>
