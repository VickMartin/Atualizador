<?php
// pegar o id do usuario que sera alterado
require_once '../model/DTO/AlunoDTO.php';
require_once '../model/DAO/AlunoDAO.php';

$id = $_GET['id'];
$alunoDAO = new AlunoDAO();
$aluno = $alunoDAO->BuscarAlunoPorId($id); // Busca os dados do aluno pelo ID
var_dump($aluno); // Verifique o que está sendo retornado aqui

?>
