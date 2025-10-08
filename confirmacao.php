<?php
// Define o tipo de conteúdo como HTML
header('Content-Type: text/html; charset=utf-8');

// Verifica se o formulário foi submetido (se há dados na URL via método GET)
if (!empty($_GET)) {
    // A superglobal $_GET contém um array associativo com os dados do formulário.
    // As chaves são os valores dos atributos 'name' dos seus campos HTML.

    // 1. Coletando e Sanitizando os Dados
    // Usamos htmlspecialchars() para evitar ataques XSS (Cross-Site Scripting)
    // ao exibir os dados na tela.

    $nome_paciente    = htmlspecialchars($_GET['nome_paciente'] ?? 'Não informado');
    $nome_responsavel = htmlspecialchars($_GET['nome_responsavel'] ?? 'Não informado');
    $idade_paciente   = htmlspecialchars($_GET['idade_paciente'] ?? 'Não informada');
    $contato_info     = htmlspecialchars($_GET['contato_info'] ?? 'Não informado');
    $mensagem         = htmlspecialchars($_GET['mensagem'] ?? 'Nenhuma mensagem');

    // 2. Exibindo a Confirmação e os Dados Recebidos

    echo '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Envio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; color: #333; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h1 { color: #007bff; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        p strong { display: inline-block; width: 180px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dados Enviados com Sucesso!</h1>
        <p>Obrigado pelo seu contato. Abaixo estão os dados que recebemos:</p>

        <p><strong>Nome do Paciente:</strong> ' . $nome_paciente . '</p>
        <p><strong>Nome do Responsável:</strong> ' . $nome_responsavel . '</p>
        <p><strong>Idade do Paciente:</strong> ' . $idade_paciente . '</p>
        <p><strong>Telefone/E-mail:</strong> ' . $contato_info . '</p>
        <p><strong>Mensagem:</strong> ' . nl2br($mensagem) . '</p>

        <hr>
        <p>Em breve entraremos em contato para confirmar o agendamento.</p>
    </div>
</body>
</html>';

} else {
    // Caso a página seja acessada diretamente sem dados
    echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Erro</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Erro: Nenhum dado de formulário recebido.</h1>
        <p>Por favor, retorne e preencha o formulário.</p>
    </div>
</body>
</html>';
}
?>