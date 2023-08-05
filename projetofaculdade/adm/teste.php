
      <?php 
    class Pessoa{
        private $pdo;
        
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
            
        public function buscarestudantes(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM estudantes ORDER BY id ");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarprofessores(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * from professores order by id  ");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } public function buscarmaterias(){
            $res = array();
            $cmd = $this->pdo->query("SELECT materias.nome FROM materias
            INNER JOIN professores ON materias.id_professor = professores.id
           ");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }public function buscarmatriculas(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM matriculas");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarmateriastodo(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM materias
           ");
            $res = $cmd ->fetchAll(PDO::FETCH_ASSOC);
            return $res;}
      
 //buscar os dados de uma pessoa
     public function buscardadosPessoa($id){
        $res =  array();
        $cmd = $this ->pdo -> prepare("SELECT * FROM estudantes where id =:id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd ->fetch(PDO::FETCH_ASSOC);//FETCH PQ É SÓ UMA PESSOA
        return $res;

    }
    public function cadastrarPessoa($nome,$usuario,$senha){
        //verificar se ja possui cadastro
        $cmd = $this->pdo->prepare("SELECT id FROM logar WHERE usuario =:e");
        $cmd ->bindValue(":e",$usuario);
        $cmd-> execute();
        if($cmd->rowCount()>0)//usuario ja cadastrado
        {
            return false;
        }else{

                   $cmd = $this ->pdo->prepare("INSERT INTO logar(nome,usuario,senha,painel,status)VALUES(:n,:t,:e,'adm','ativo')");
                   $cmd ->bindValue(":n",$nome);
                   $cmd ->bindValue(":t",$usuario);
                   $cmd ->bindValue(":e",$senha);
                   $cmd -> execute();
                    return true;
                            
        }

    }
    function listarEstudantes($pagina = 1){
      if(!$pagina){
      $pagina = 1;
      }
      $limite=8;
      $inicio = ($pagina * $limite)- $limite;
      $p = new PDO("mysql:host=localhost;dbname=id20841538_escola","id20841538_natan","Lucasnatan12@");
      $registros =  $p->query("SELECT COUNT(*) count from estudantes")->fetch()["count"];
      $paginas = ceil($registros/$limite);
      $result = $p->query("SELECT * FROM estudantes ORDER BY nome LIMIT $inicio,$limite")->fetchAll();
      return ['estudantes' => $result, 'paginas' => $paginas];
      }
      function listarprofessores($pagina = 1){
          if(!$pagina){
          $pagina = 1;
          }
          $limite=8;
          $inicio = ($pagina * $limite)- $limite;
          $p = new PDO("mysql:host=localhost;dbname=id20841538_escola","id20841538_natan","Lucasnatan12@");
          $registros =  $p->query("SELECT COUNT(*) count from professores")->fetch()["count"];
          $paginas = ceil($registros/$limite);
          $result = $p->query("SELECT * FROM professores ORDER BY nome LIMIT $inicio,$limite")->fetchAll();
          return ['professores' => $result, 'paginas' => $paginas];
          }
      
 
}

?>