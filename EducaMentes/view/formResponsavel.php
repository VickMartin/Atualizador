
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
-

    </div>


    <div class="form-content">
            <h2>Cadastro de Responsável</h2>
            <form action="../control/cadastroUsuarioControl.php" method="POST">
                <input type="hidden" name="perfil" value="responsavel">
                <label for="nome-responsavel">Nome:</label>
                <input type="text" id="nome-responsavel" name="nome" placeholder="Nome do Responsável" required>
                <br>
                <label for="email-responsavel">Email:</label>
                <input type="email" id="email-responsavel" name="email" placeholder="Email" required>
                <br>
                <label for="cpf-responsavel">CPF:</label>
                <input type="text" id="cpf-responsavel" name="cpf" placeholder="CPF" required>
                <br>
                <label for="senha-responsavel">Senha:</label>
                <input type="password" id="senha-responsavel" name="senha" placeholder="Senha" required>
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>



   
</body>

</html>