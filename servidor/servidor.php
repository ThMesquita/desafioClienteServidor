<?php
$host = "0.0.0.0";
$port = 5000;

// Configuração do banco
$db_host = "localhost";
$db_user = "root";
$db_pass = "sua_senha"; // ajuste aqui
$db_name = "cliente_servidor";

// Conexão com o MySQL
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Falha ao conectar no banco: " . $conn->connect_error);
}

// Cria o socket TCP
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($sock, $host, $port);
socket_listen($sock);

echo "Servidor rodando na porta $port...\n";

while (true) {
    $client = socket_accept($sock);
    $msg = socket_read($client, 1024);
    $msg = trim($msg);

    if ($msg) {
        echo "Recebido: $msg\n";

        // Salvar mensagem no banco
        $stmt = $conn->prepare("INSERT INTO mensagens (conteudo) VALUES (?)");
        $stmt->bind_param("s", $msg);
        $stmt->execute();
        $stmt->close();

        // Resposta para o cliente
        $resposta = "Mensagem salva no servidor: $msg";
        socket_write($client, $resposta, strlen($resposta));
    }

    socket_close($client);
}

socket_close($sock);
$conn->close();
