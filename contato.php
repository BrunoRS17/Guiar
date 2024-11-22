<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato | GUIAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Shortcut Icon" type="image/png" href="img/G.png">
    <link rel="stylesheet" href="CssnavbarRodape.css">

    <style>
        @font-face {
            font-family: 'Brice-Bold';
            src: url('fonts/Brice-BoldSemiCondensed.ttf') format('truetype');
        }

        @font-face {
            font-family: 'BasisGrotesque-Regular';
            src: url('fonts/BasisGrotesqueArabicPro-Regular.ttf') format('truetype');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #fefaf1 !important;
            font-family: 'BasisGrotesque-Regular';
        }

        .contact-container {
            padding: 40px;
        }

        .contact-form h2 {
            font-family: 'Brice-Bold';
            margin-bottom: 20px;
            font-size: 50px;
            -webkit-text-stroke-width: 1.5px;
            -webkit-text-stroke-color: #131646;
            -webkit-text-fill-color: #ff9a52;
        }

        .contact-form textarea {
            resize: none; /* Impede redimensionamento do textarea */
        }

        .social-icons {
            display: flex;
            gap: 15px; /* Espaçamento entre os ícones */
            align-items: center; /* Alinha os ícones verticalmente */
        }

        .social-icons img, .social-icons i {
            width: 30px; /* Tamanho dos ícones */
            height: auto; /* Mantém a proporção do ícone */
        }

        .footer {
            text-align: center;
            padding: 20px 0;
        }
        
        .submit-container {
            display: flex;
            justify-content: space-between; /* Espaça os elementos dentro do container */
            align-items: center; /* Alinha verticalmente os itens */
            margin-top: 20px; /* Margem superior para separar do campo anterior */
        }
        
        #botao {
            width: 25%;
            background-color: #fc8835;
            border: 0px solid;
            letter-spacing: 1px;
            transition: 0.5s;
        }

        #botao:hover {
            transform: scale(1.05);
            border-bottom-right-radius: 0px;
            border-top-left-radius: 0px;
        }
    </style>
</head>
<body>
    <!--CABEÇALHO-->
    <nav class="navbar navbar-expand-lg custom-navbar" id="gblur">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img style="height: 90px;" src="img/Guiar.png" alt="LOGO"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="ADM/loginEmpresa.php">Empresa</a></li>
                    <li class="nav-item"><a class="nav-link" href="ENTREGADOR/loginEntregador.php">Entregador</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FORMS PARA ENVIAR CONTATO -->
    <div class="contact-container container">
        <div class="row align-items-center">
            <!-- Formulário de Contato -->
            <div class="col-md-6 contact-form">
                <h2>Entre em Contato</h2>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>

                    <!-- Container para o botão e ícones -->
                    <div class='submit-container'>
                        <!-- Ícones de Redes Sociais -->
                        <div class='social-icons'>
                            <a href="https://web.whatsapp.com"><i class='fa fa-whatsapp' style="font-size:30px;color:#000"></i></a>
                            <a href="https://www.instagram.com/guiartcc?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class='fa fa-instagram' style="font-size:30px;color:#000"></i></a>
                            <a href="https://www.facebook.com/?locale=pt_BR"><i class='fa fa-facebook' style="font-size:30px;color:#000"></i></a>
                        </div>

                        <!-- Botão de Enviar -->
                        <button type='submit' id='botao' class='btn btn-primary'>Enviar</button>
                    </div>

                </form>
            </div>

            <!-- Imagem ao lado do formulário -->
            <div class='col-md-6'>
                <img src="img/Questions-bro.png" alt="" style='max-width: 100%; height: auto;'>
            </div>
        </div>
    </div>

    <!-- RODAPÉ -->
    <footer class='footer text-center'>
        <div class='container p-3'>
            <p>&copy; 2024 GUIAR. Todos os direitos reservados.</p>
            <ul class='list-unstyled'>
                <li><a href='#' class='text-black'>Política de Privacidade</a></li>
                <li><a href='#' class='text-black'>Termos de Serviço</a></li>
            </ul>
        </div>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js'></script>

</body>
</html>