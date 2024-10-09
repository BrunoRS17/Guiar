<?php
require '../config.php';

session_start();

if (!isset($_SESSION['company_id'])) {
    die("Empresa não identificada. Faça login novamente.");
}

$company_id = $_SESSION['company_id'];

$nome_adm = $_POST['adminNome'];
$nome_usuario = $_POST['adminUsername'];
$senha = $_POST['adminPassword'];
// Para criptografar: $senha = password_hash($_POST['adminPassword'], PASSWORD_BCRYPT);

try {
    $sql = "INSERT INTO administrador (nome_adm, nome_usuario, senha, FK_EMPRESA_id_empresa) 
            VALUES (:nome_adm, :nome_usuario, :senha, :company_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome_adm', $nome_adm, PDO::PARAM_STR);
    $stmt->bindParam(':nome_usuario', $nome_usuario, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Administrador adicionado com sucesso.";
        header("Location: escolherAdm.php");
        exit();
    } else {
        echo "Erro ao adicionar administrador.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>