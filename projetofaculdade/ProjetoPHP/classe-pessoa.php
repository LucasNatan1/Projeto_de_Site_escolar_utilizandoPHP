<?php 
    class Pessoa{
        private $pdo;
        //6 metodos 
        //CONEXAO COM BANCO DE DADOS
        public function __construct($dbname,$host,$user, $senha)
        {
            try {
                $this->pdo= new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            } catch (PDOException $e) {
                echo"Erro com banco de dados:".$e-> getMessage();
                exit();
            }catch (Exception $e) { 
                echo"Erro Generico:".$e-> getMessage();
                exit();

            }
           
           
        }

            // FUNÇÂO PRA BUSCAR OS DADOS
            
        public function buscarDados(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY ID ");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        //FUNCAO PRA CADASTRA OS OUTRO NO BANCO DE DADOS
        public function cadastrarPessoa($nome,$telefone,$email){
            //verificar se ja possui cadastro
            $cmd = $this->pdo->prepare("SELECT id FROM PESSOA WHERE email =:e");
            $cmd ->bindValue(":e",$email);
            $cmd-> execute();
            if($cmd->rowCount()>0)//email ja existente
            {
                return false;
            }else{
    
                       $cmd = $this ->pdo->prepare("INSERT INTO pessoa(nome,telefone,email)VALUES(:n,:t,:e)");
                       $cmd ->bindValue(":n",$nome);
                       $cmd ->bindValue(":t",$telefone);
                       $cmd ->bindValue(":e",$email);
                       $cmd -> execute();
                        return true;
                                
            }

        }
     public function excluir($id){
        $cmd = $this ->pdo -> prepare("DELETE FROM pessoa WHERE id =:id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
     }
 //buscar os dados de uma pessoa
     public function buscardadosPessoa($id){
        $res =  array();
        $cmd = $this ->pdo -> prepare("SELECT * FROM pessoa where id =:id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd ->fetch(PDO::FETCH_ASSOC);//FETCH PQ É SÓ UMA PESSOA
        return $res;

    }
    //ATUALIZAR OS DADOS NO BANCO DE DADOS
    public function atualizarDados($id,$nome,$telefone,$email){
        //verificar se o email esta cadastrado
        
        $cmd = $this ->pdo -> prepare("UPDATE pessoa SET nome =:n,telefone =:t, email =:e WHERE id = :id");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":t",$telefone);
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        header("location:index.php");
        return true;

       


    }

}
   

?>