<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../config.php'; // Certifique-se de que o caminho para a conexão está correto

    $token = $_POST['token'];
    $newPassword = $_POST['password'];

    // Verificar se o token é válido
    $stmt = $pdo->prepare("SELECT user_id FROM password_resets WHERE token = :token AND expiry > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo "Token inválido ou expirado.";
        exit;
    }

    $userId = $stmt->fetchColumn();

    // Atualizar a senha no banco de dados
    $stmt = $pdo->prepare("UPDATE empresa SET senha = :senha WHERE id_empresa = :id");
    $stmt->bindParam(':senha', $newPassword);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();

    // Remover o token usado comita por favor
    $stmt = $pdo->prepare("DELETE FROM password_resets WHERE token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

   echo '<div class="alert alert-success"> Senha redefinida com sucesso. </div>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-container .btn-primary {
            background-color: #ff9a52;
            border-color: black;
            transition: all 0.3s;
        }

        .form-container .btn-primary:hover {
            background-color: #d54e21;
            
           
        }


        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="form-container">
<h1>Recuperar Senha</h1>

    <form method="POST">
    <div class="mb-3">
    
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <label for="password">Nova senha:</label>
        <input type="password" name="password" required> <br>
        </div>
        <button type="submit" class="btn btn-primary w-100">Redefinir</button>
    </form>

    </div>

<footer>
    &copy; <?php echo date('Y'); ?> GUIAR. Todos os direitos reservados.
</footer>
</body>
</html>