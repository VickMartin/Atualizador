<?php
require_once '../model/DTO/UsuarioDTO.php';
require_once '../model/DAO/UsuarioDAO.php';
$cpf = $_GET['cpf'];


    $usuarioDAO = new UsuarioDAO();

    $responsavel = $usuarioDAO->buscarResponsavelPorCPF($cpf);

    if (empty($responsavel)) {
    echo "<script>
            alert('CPF não encontrado, verifique se digitou corretamente!');
            window.location.href = '../view/buscarPai.php';
          </script>";
    exit;
}

    

  


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA | VM</title>
    <link rel="stylesheet" href="../css/adm.css">
</head>

<body>
    <!-- Barra de navegação -->
    <nav class="navbar">
        <div class="system-name">
            <h3>Educa<span>Mentes</span></h3>
        </div>
        <a href="logout.php" class="logout-button">Sair</a>
    </nav>

    <!-- Guia lateral -->
    <div class="sidebar">

        <div class="menu-container">
            <h3 class="menu-text">Menu</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="btn_menu" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            </svg>
        </div>
        <hr>
        <br>
        <a href="formMeuperfil.php" class="sidebar-btn" onclick="showSection('perfil')">Meu Perfil</a>
        <a href="gerencia.php" class="sidebar-btn" onclick="showSection('gerencia')">Gerenciar Prefis</a>
        <a href="buscarPai.php" class="sidebar-btn">Cadastrar Alunos</a>
        <a href="formResponsavel.php" class="sidebar-btn" onclick="showSection('responsavelForm')">Cadastrar Responsável</a>
        <a href="professorForm.php" class="sidebar-btn" >Cadastrar Professor</a>
        <a href="#" class="sidebar-btn" onclick="showSection('criarTurmas')">Criar Turmas</a>


    </div>


 

    <div class="form-aluno">
       <fieldset class="fieldset-aluno">

            <h2>Cadastro de Aluno</h2>
            <h3>Nome do responsável: <br></h3>
            <h4><?php echo $responsavel['nome'] ?></h4> 
            
            <form action="../control/cadastrarAlunoControl.php" method="POST">

            <?php

                //  var_dump($responsavel);   
                 
                 ?>    

                <input type="hidden" name="id_responsavel" value="<?php echo $responsavel['id_responsavel']?>">
                <input type="hidden" name="nome_mae" value="<?php echo $responsavel['nome']?>">

                <label for="cpf_responsavel">CPF do Responsável:</label>
                <input type="text" id="cpf_responsavel" name="cpf_responsavel" value="<?php echo $responsavel['cpf']?>" required>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Nome do aluno(a)" required>
                
                <label for="ano_ingresso">Ano de Ingresso:</label>
                <input type="text" id="ano_ingresso" name="ano_ingresso" required>
                   
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
     
                <label for="tipo_sanguineo">Tipo Sanguíneo:</label>
                    <select id="tipo_sanguineo" name="tipo_sanguineo" required>
                        <option value="">Selecione</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
        
                <label for="deficiencia">Deficiência:</label>
                <input type="text" id="deficiencia" name="deficiencia" placeholder="Descreva se houver">
                <br>

                <label for="alergia">Alergia:</label>
                <input type="text" id="alergia" name="alergia" placeholder="Descreva se houver">
                <br>

                <input type="submit" value="Cadastrar">
        </form>
    </fieldset> 


</div>

</body>

</html>




   
