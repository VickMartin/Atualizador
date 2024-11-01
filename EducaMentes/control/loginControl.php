<?php
require_once'../model/DAO/AdmDAO.php';
require_once'../model/DAO/UsuarioDAO.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

//  var_dump($email, $senha);

$admDAO = new AdmDAO();
$sucessoAdm = $admDAO->validarLogin($email, $senha);

$usuarioDAO = new UsuarioDAO();
$sucessoUsuario = $usuarioDAO->validarLogin($email, $senha);

if ($sucessoAdm) {
    echo "<script>
        alert('Logado como administrador!'); 
        window.location.href = '../view/telaAdm.php';
    </script>";
} elseif ($sucessoUsuario) {

    $usuarioDAO = new UsuarioDAO();
    $perfilUsuario = $usuarioDAO->buscarPerfil($email, $senha);
        
        if ($perfilUsuario) {
            // Redireciona com base no perfil do usuário
            if ($perfilUsuario === 'responsavel') {
                echo "<script>
                    alert('Logado como responsável!'); 
                    window.location.href = '../view/telaResponsavel.php';
                </script>";
            } elseif ($perfilUsuario === 'professor') {
                echo "<script>
                    alert('Logado como professor!'); 
                    window.location.href = '../view/telaProfessor.php';
                </script>";
            }
        }      
    }else{
        echo "<script>
        alert('Usuário não encontrado!');
        window.location.href = '../index.php';
        </script>";
    }
?>