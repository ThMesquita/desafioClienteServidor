<?php
if ($argc < 2) {
    echo "Uso: php cliente.php <ip-do-servidor>\n";
    exit(1);
}

$host = $argv[1];
$port = 5000;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (socket_connect($sock, $host, $port)) {
    echo "Conectado ao servidor $host:$port\n";

    while (true) {
        $linha = readline("> ");
        if (strtolower(trim($linha)) === "sair") {
            break;
        }

        socket_write($sock, $linha, strlen($linha));
        $resposta = socket_read($sock, 1024);
        echo "Resposta: $resposta\n";
    }
} else {
    echo "Não foi possível conectar ao servidor.\n";
}

socket_close($sock);
