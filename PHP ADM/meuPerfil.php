<?php
// Inicie a sessão, se ainda não estiver iniciada
session_start();

// Verifica se o ID da empresa está definido na sessão
if (!isset($_SESSION['company_id'])) {
    die("Empresa não identificada. Faça login novamente.");
}

// Verifica se o administrador está logado
if (!isset($_SESSION['nome_usuario'])) {
    echo '<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro de Acesso</title>
        <link
    rel="Shortcut Icon" 
    type="image/png"
    href="../img/G.png">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .error-message {
                background-color: #ffdddd;
                color: #d8000c;
                border: 1px solid #d8000c;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                max-width: 400px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .error-message h1 {
                margin: 0;
                font-size: 18px;
            }
            .error-message p {
                margin-top: 10px;
                font-size: 16px;
            }
            .error-message a {
                color: #d8000c;
                text-decoration: none;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="error-message">
            <h1>Administrador não identificado</h1>
            <p>Faça login novamente.</p>
            <p><a href="escolherAdm.php">Clique aqui para voltar ao login</a></p>
        </div>
    </body>
    </html>';
    exit();
}

// Função de logout
if (isset($_GET['logout'])) {
    unset($_SESSION['nome_usuario']); // Remove o nome do administrador
    header("Location: escolherAdm.php"); // Redireciona para a página de escolher adm
    exit();
}

$company_id = $_SESSION['company_id']; 
$nomeAdmin = $_SESSION['nome_usuario'];

// Conectar ao banco de dados e buscar as informações do administrador
require '../config.php';

try {
    $sql = "SELECT * FROM administrador WHERE nome_usuario = :nome_usuario AND FK_EMPRESA_id_empresa = :company_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome_usuario', $nomeAdmin, PDO::PARAM_STR);
    $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$admin) {
        die("Administrador não encontrado.");
    }

    if (isset($_SESSION['company_name'])) {
        $nome_empresa = $_SESSION['company_name'];
    } else {
        // Caso o nome da empresa não esteja na sessão, você pode buscar do banco
        $stmtEmpresa = $pdo->prepare("SELECT nome_empresa FROM empresa WHERE id_empresa = :company_id");
        $stmtEmpresa->bindParam(':company_id', $company_id, PDO::PARAM_INT);
        $stmtEmpresa->execute();
        $empresa = $stmtEmpresa->fetch(PDO::FETCH_ASSOC);
        $nome_empresa = $empresa['nome_empresa'];
    }

    // Recuperar a foto do administrador
    $fotoAdmin = htmlspecialchars($admin['nome_foto']);
    $caminho_foto = 'admin_fotos/' . htmlspecialchars($nome_empresa) . '/' . $fotoAdmin;
    
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }
        
        .sidebar a:hover {
            background-color: #575757;
        }
        
        .sidebar .spacer {
            flex: 0.9;
        }
        
        .main {
            margin-left: 250px;
            padding: 15px;
        }

        /* Estilo do card */
        .card {
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card img {
            width: 320px;
            height: 350px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #e06c00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-btn:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="../PHP ADM/indexAdm.php">Início</a>
        <a href="../PHP ADM/pedidos.php">Pedidos</a>
        <a href="../PHP ADM/entregadores.php">Entregadores</a>
        <a href="../PHP ADM/pedidosEntregues.php">Pedidos Entregues</a>
        <div class="spacer"></div>
        <a href="">Meu perfil</a>
    </div>

    <!-- Botão de logout -->
    <a href="indexAdm.php?logout=true" class="logout-btn">Logout</a>

    <div class="main">
        <div class="card">
            <img src="<?php echo htmlspecialchars($caminho_foto); ?>" alt="Foto do Administrador">
            <h5><?php echo htmlspecialchars($admin['nome_adm']); ?></h5>
            <p>Usuário: <?php echo htmlspecialchars($admin['nome_usuario']); ?></p>
            <p>Senha: *********</p> <!-- Escondido por segurança -->
            <button class="btn btn-primary" onclick="location.href='editarPerfil.php'">Editar</button>
        </div>
    </div>
</body>
</html>