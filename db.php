<?php
// Configurações do banco
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "senha";
$db_name = "cliente_servidor";

// Conexão
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
  die("Falha ao conectar no banco: " . $conn->connect_error);
}
