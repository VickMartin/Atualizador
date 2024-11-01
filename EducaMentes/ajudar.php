$alunoDAO = new AlunoDAO();
    
    $resultado = $alunoDAO->cadastroAluno($alunoDTO);
if ($resultado) {
    $mensagem = "Aluno(a) cadastrado com sucesso!";
    $status = "success";
} else {
    $mensagem = "Erro ao cadastrar Aluno(a)! .";
    $status = "error";
}

echo "<script type='text/javascript'>
        window.onload = function() {
            exibirModal('$mensagem', '$status');
        };
      </script>";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="../css/cadastroUser.css">
</head>
<body>

<!-- Modal de feedback -->
<div id="modal" class="modal">
    <h1>Resultado do Cadastro</h1>
    <p id="mensagem"></p>
    <button onclick="fecharModal()">Fechar</button>
</div>

<!-- Importa o arquivo modal.js com o código JavaScript -->
<script src="../javaScript/cadastroUser.js"></script>

<!-- Script inline para exibir o modal ao carregar a página -->
<script type="text/javascript">
    window.onload = function() {
        exibirModal('<?php echo $mensagem; ?>', '<?php echo $status; ?>');
    };
</script> 
</body>
</html>

    






?>
