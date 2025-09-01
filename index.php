<?php
include 'db.php';

$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["mensagem"])) {
  $msg = $_POST["mensagem"];

  // Salva no banco
  $stmt = $conn->prepare("INSERT INTO mensagens (conteudo) VALUES (?)");
  $stmt->bind_param("s", $msg);
  if ($stmt->execute()) {
    $mensagem = "Mensagem salva com sucesso!";
  } else {
    $mensagem = "Erro ao salvar a mensagem.";
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cliente-Servidor MVP</title>
</head>

<body>
  <h1>Enviar Mensagem</h1>
  <?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
  <form method="POST" action="">
    <input type="text" name="mensagem" placeholder="Digite sua mensagem" required>
    <button type="submit">Enviar</button>
  </form>
</body>

</html>