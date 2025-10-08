<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Enviados - CETEA</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <h1>CETEA</h1>
                <p class="subtitle">Centro de Especialização no Transtorno do Espectro Autista</p>
            </div>
        </div>
    </header>

    <main>
        <section id="confirmation" style="padding: 40px 0;">
            <div class="container" style="text-align: center;">
                <h2>Seu Pré-Cadastro Foi Recebido!</h2>
                <p>Obrigado por entrar em contato. Seus dados foram enviados com sucesso. Nossa equipe entrará em contato com você em breve.</p>

                <div class="submitted-data" style="margin-top: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; text-align: left;">
                    <h3 style="text-align: center;">Detalhes do Envio:</h3>
                    <?php
                        // Verifica se os dados foram enviados via método POST
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Pega os dados do formulário e limpa para segurança
                            $nome_paciente = htmlspecialchars($_POST['nome_paciente']);
                            $nome_responsavel = htmlspecialchars($_POST['nome_responsavel']);
                            $idade_paciente = htmlspecialchars($_POST['idade_paciente']);
                            $contato_info = htmlspecialchars($_POST['contato_info']);
                            $mensagem = htmlspecialchars($_POST['mensagem']);

                            // Exibe os dados de forma organizada
                            echo "<p><strong>Nome do Paciente:</strong> " . $nome_paciente . "</p>";
                            echo "<p><strong>Nome do Responsável:</strong> " . $nome_responsavel . "</p>";
                            echo "<p><strong>Idade do Paciente:</strong> " . $idade_paciente . "</p>";
                            echo "<p><strong>Telefone ou E-mail:</strong> " . $contato_info . "</p>";
                            
                            // Apenas mostra a mensagem se ela não estiver vazia
                            if (!empty($mensagem)) {
                                echo "<p><strong>Mensagem:</strong> " . nl2br($mensagem) . "</p>";
                            }

                        } else {
                            // Se a página for acessada diretamente, exibe um aviso
                            echo "<p>Ocorreu um erro. Por favor, envie os dados através do formulário.</p>";
                        }
                    ?>
                </div>

                <a href="index.html" class="cta-button" style="display: inline-block; margin-top: 30px;">Voltar para a Página Inicial</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 CETEA. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>