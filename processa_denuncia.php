<?php
// Obter dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$secretaria = $_POST['secretaria'];
$descricao = $_POST['descricao'];
$anexo = $_FILES['anexo']['name'];

// Endereço de e-mail da secretaria (ajuste conforme necessário)
$emailSecretaria = [
    'obras' => 'digio1147@gmail.com',
    'educacao' => 'digio1147@gmail.com',
    'saude' => 'digio1147@gmail.com'
];

// Determinar o e-mail da secretaria com base na seleção
$to = $emailSecretaria[$secretaria] ?? 'contato@ipixuna.pa.gov.br';

// Assunto do e-mail
$subject = 'Nova Denúncia Recebida';

// Corpo do e-mail
$message = "
    <html>
    <head>
        <title>Nova Denúncia</title>
    </head>
    <body>
        <p><strong>Nome:</strong> $nome</p>
        <p><strong>Telefone:</strong> $telefone</p>
        <p><strong>E-mail:</strong> $email</p>
        <p><strong>Secretaria Responsável:</strong> $secretaria</p>
        <p><strong>Descrição da Denúncia:</strong></p>
        <p>$descricao</p>
    </body>
    </html>
";

// Cabeçalhos do e-mail
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Adicionar o e-mail do remetente (opcional)
$headers .= 'From: ' . $email . "\r\n";

// Enviar o e-mail
if (mail($to, $subject, $message, $headers)) {
    echo "Denúncia enviada com sucesso!";
} else {
    echo "Houve um erro ao enviar a denúncia.";
}
?>
