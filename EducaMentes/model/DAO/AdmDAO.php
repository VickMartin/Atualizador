<?php

require_once'Conexao.php';

class AdmDAO{
    //estabelecer conexão com o banco de dados
    public $pdo = null;
    //construtor da classe que estabelece a canexão com o banco de dados no momentoda criação do objeto DAO
    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function validarLogin($email,$senha){
        try{
            $sql = "SELECT * FROM cadastroadm WHERE email = '{$email}' AND senha = '{$senha}'; ";
            $stml = $this->pdo->prepare($sql);

            $stml->execute();
            $retorno = $stml->fetch(PDO::FETCH_ASSOC);

            return $retorno;


        }catch(PDOException $exe){

            echo $exe->getMessage();
 
        }
    }

   
    
    public function getAdminInfoById($adminId) {
        try {
            // Ajuste para a tabela e a coluna de ID corretas
            $sql = "SELECT id_Adm, nome, email, foto FROM cadastroadm WHERE id_Adm = :adminId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            return null;
        }
    }
    
    






















    }
  









   
    




?>