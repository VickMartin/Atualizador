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
            <!-- Menu lateral -->
        </div>
        <hr>
        <br>
        <a href="formMeuperfil.php" class="sidebar-btn" onclick="showSection('perfil')">Meu Perfil</a>
        <a href="gerencia.php" class="sidebar-btn" onclick="showSection('gerencia')">Gerenciar Perfis</a>
        <a href="buscarPai.php" class="sidebar-btn">Cadastrar Alunos</a>
        <a href="formResponsavel.php" class="sidebar-btn" onclick="showSection('responsavelForm')">Cadastrar Responsável</a>
        <a href="professorForm.php" class="sidebar-btn">Cadastrar Professor</a>
        <a href="#" class="sidebar-btn" onclick="showSection('criarTurmas')">Criar Turmas</a>
    </div>

    <div class="container-maior">
        <fieldset class="profile">
            <legend>Perfil</legend>
            <form action="processarAlteracao.php" method="POST" enctype="multipart/form-data">
                <div class="foto-container">
                    <label for="foto" class="foto-label">
                        <img id="foto-preview" src="<?php echo !empty($adminInfo['foto']) ? $adminInfo['foto'] : 'default.jpg'; ?>" alt="">
                        <span class="icon-label">
                            <!-- Ícone SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </span>
                    </label>
                    <input type="file" name="foto" id="foto" accept="image/*" onchange="loadImage(event)" style="display: none;">
                </div>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" value="" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                
                <input id="submit-input" type="submit" value="Editar Informações">
            </form>
        </fieldset>

       
    </div>
    
    <script src="../javaScript/perfilAdm.js"></script>
</body>

</html>
