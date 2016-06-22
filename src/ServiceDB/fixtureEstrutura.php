<?php

require_once 'ConnectDB.php';

$conexao = new src\ServiceDB\ConnectDB();
$conn = $conexao->getConn();

$conn->query("﻿DROP TABLE evento_professor;");
$conn->query("DROP TABLE evento_aluno;");
$conn->query("DROP TABLE evento;");
$conn->query("DROP TABLE entrega;");
$conn->query("DROP TABLE certificado;");
$conn->query("DROP TABLE professor;");
$conn->query("DROP TABLE secretaria;");
$conn->query("DROP TABLE aluno;");

$conn->query("CREATE TABLE aluno (
              	cod_aluno serial,
              	nr_matricula INT NOT NULL UNIQUE,
              	cpf VARCHAR(12) NOT NULL UNIQUE,
              	nome VARCHAR(30) NOT NULL,
              	telefone VARCHAR(13),
              	PRIMARY KEY (cod_aluno)
              );");

$conn->query("CREATE TABLE usuario (
              	cod_usuario serial,
              	cpf VARCHAR(12) NOT NULL UNIQUE,
              	nome VARCHAR(30) NOT NULL,
              	telefone VARCHAR(13),
              	PRIMARY KEY (cod_usuario)
              );");

$conn->query("CREATE TABLE professor (
              	cod_professor serial,
              	cpf VARCHAR(12) NOT NULL UNIQUE,
              	nome VARCHAR(30) NOT NULL,
              	telefone VARCHAR(13),
              	PRIMARY KEY (cod_professor)
              );");

$conn->query("CREATE TABLE certificado (
              	cod_certificado serial,
              	inst_emissora VARCHAR(11) NOT NULL,
              	descricao VARCHAR(30),
              	qtd_horas int NOT NULL,
              	data_emissao VARCHAR(10) NOT NULL,
              	PRIMARY KEY (cod_certificado)
              );");

$conn->query("CREATE TABLE entrega (
              	cod_entrega serial,
              	cod_aluno int NOT NULL,
              	cod_usuario int NOT NULL,
              	cod_certificado int NOT NULL,
              	data_entrega_cert VARCHAR(10),
              	PRIMARY KEY (cod_entrega),
              	FOREIGN KEY (cod_aluno) REFERENCES aluno (cod_aluno),
              	FOREIGN KEY (cod_usuario) REFERENCES usuario (cod_usuario),
              	FOREIGN KEY (cod_certificado) REFERENCES certificado (cod_certificado)
              );");

$conn->query("CREATE TABLE evento (
              	cod_evento serial,
              	cod_certificado int,
              	desc_evento VARCHAR(15) NOT NULL,
              	data_ini VARCHAR(10) NOT NULL,
              	data_fim VARCHAR(10) NOT NULL,
              	valor float NOT NULL,
              	cidade VARCHAR(15) NOT NULL,
              	desc_local VARCHAR(15) NOT NULL,
              	PRIMARY KEY (cod_evento),
              	FOREIGN KEY (cod_certificado) REFERENCES certificado (cod_certificado)
              );");

$conn->query("CREATE TABLE evento_aluno (
              	cod_evento int NOT NULL,
              	cod_aluno int NOT NULL,
              	PRIMARY KEY (cod_evento, cod_aluno),
              	FOREIGN KEY (cod_evento) REFERENCES evento (cod_evento),
              	FOREIGN KEY (cod_aluno) REFERENCES aluno (cod_aluno)
              );");

$conn->query("CREATE TABLE evento_professor (
              	cod_evento int NOT NULL,
              	cod_professor int NOT NULL,
              	PRIMARY KEY (cod_evento, cod_professor),
              	FOREIGN KEY (cod_evento) REFERENCES evento (cod_evento),
              	FOREIGN KEY (cod_professor) REFERENCES professor (cod_professor)
              );");

?>
