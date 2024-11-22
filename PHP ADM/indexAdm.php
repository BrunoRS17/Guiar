<?php
// Inicie a sessão, se ainda não estiver iniciada
session_start();

// Verifica se o ID da empresa está definido na sessão
if (!isset($_SESSION['company_id'])) {
    die("Empresa não identificada. Faça login novamente.");
}
// Verifica se o administrador está logado
if (!isset($_SESSION['nome_usuario'])) {
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
}



// Função de logout
if (isset($_GET['logout'])) {
    unset($_SESSION['nome_usuario']); // Remove o nome do administrador
    header("Location: escolherAdm.php"); // Redireciona para a página de escolher adm
    exit();
}

$nomeAdmin = $_SESSION['nome_usuario']; 
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Index | Administrador</title>
    <link
    rel="Shortcut Icon" 
    type="image/png"
    href="../img/G.png">
    <style>
        @font-face {
            font-family: 'Brice-Bold';
            src: url('../fonts/Brice-BoldSemiCondensed.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BasisGrotesque-Regular';
            src: url('../fonts/BasisGrotesqueArabicPro-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Brice-SemiBoldSemi';
            src: url('../fonts/Brice-SemiBoldSemiCondensed.ttf');
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            margin: 0;
            background-color: #fefaf1 !important;
            font-family: 'BasisGrotesque-Regular';
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

        .main h1 {
            font-family: 'Brice-Bold';
            font-size: 40px;
        }

        .main h1 spam {
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #131646;
            -webkit-text-fill-color: #ff9a52;
        }

        .dicas {
            margin-top: 20px;
            padding: 15px;
        }

        .dicas h2 {
            font-family: 'Brice-Bold';
            font-size: 35px;
            color: #131646;
            margin-bottom: 40px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* Espaçamento entre os cards */
            justify-content: center;
        }

        .card {
            align-items: center;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            height: 100%;
        }

        .card-icon {
            width: 60px; /* Tamanho do ícone */
            height: auto; /* Mantém a proporção do ícone */
            margin-bottom: 20px;
        }

        .card h3 {
            font-family: 'Brice-SemiBoldSemi';
            font-size: 20px;
            color: #131646;
        }

        .card p {
            font-size: 16px;
            color: #555555; /* Cor do texto da descrição */
        }

        .dicas ul {
            list-style-type: disc; /* Estilo da lista */
            padding-left: 20px; /* Espaçamento à esquerda */
        }

        .dicas li {
            margin-bottom: 10px; /* Espaçamento entre itens */
            font-size: 16px;
        }

          /* Estilo para posicionar o botão no canto superior direito */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #fc8835;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.5s;
        }

        .logout-btn:hover {
            background-color: #ff7b00;
            transform: scale(1.05);
            border-bottom-right-radius: 0px;
            border-top-left-radius: 0px;
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
        <a href="../PHP ADM/meuPerfil.php">Meu perfil</a>
    </div>

     <!-- Botão de logout -->
     <a href="indexAdm.php?logout=true" class="logout-btn">Logout</a>

     <div class="main">
    <!-- Exibe a mensagem de boas-vindas -->
    <h1>Olá, <spam><?php echo htmlspecialchars($nomeAdmin) . "!"; ?></spam></h1>
    <hr color="black" size="2px">
<!-- Seção de Dicas em Cards -->
<section class="dicas">
        <center><h2>Dicas e Melhores Práticas</h2></center>
        <div class="container-fluid">
        <div class="row align-items-center">
        <div class="card-container">
            <div class="col-md-3">
            <div class="card">
                <img src="../img/icon1.png" alt="Organize seus pedidos" class="card-icon">
                <h3>Organize seus pedidos</h3>
                <p>Utilize filtros para visualizar pedidos específicos.</p>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <img src="../img/icon2.png" alt="Comunique-se com os entregadores" class="card-icon">
                <h3>Comunique-se com os entregadores</h3>
                <p>Mantenha contato direto para evitar atrasos.</p>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <img src="../img/icon3.png" alt="Revise feedbacks" class="card-icon">
                <h3>Revise feedbacks</h3>
                <p>Analise as avaliações dos clientes para melhorar o serviço.</p>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <img src="../img/icon4.png" alt="Mantenha registros atualizados" class="card-icon">
                <h3>Mantenha registros atualizados</h3>
                <p>Certeza de que todos os dados dos motoboys estejam corretos.</p>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <img src="../img/icon5.png" alt="Use relatórios" class="card-icon">
                <h3>Use relatórios</h3>
                <p>Gere relatórios periódicos para acompanhar o desempenho das entregas.</p>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
</body>
</html>