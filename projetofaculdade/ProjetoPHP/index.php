<?php 
    require_once'classe-pessoa.php';
    $p = new Pessoa("crudpdo","localhost","root","");





?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body><?php 
    if(isset($_POST['nome'])) //Clicou no botao cadastrar ou editar

    {
        //EDITAR
        if(isset($_GET['id_up'])&& !empty($_GET['id_up'])){
            $id_upd = addslashes($_GET['id_up']);
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
             $email= addslashes($_POST['email']);
        if(!empty($nome)&&!empty($telefone)&&!empty($email)){
           //editar
            !$p->atualizarDados($id_upd,$nome,$telefone,$email);
        }else{
            ?>

            <script>
                window.alert("Existe campos vazios!!")
            </script>
             <?php
                        }


        }
        //CADASTRAR
        else
        {  $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email= addslashes($_POST['email']);
        if(!empty($nome)&&!empty($telefone)&&!empty($email)){
           if(!$p->cadastrarPessoa($nome,$telefone,$email)){
            ?>

            <script>
                window.alert("Email ja cadastrado!!")
            </script>
             <?php
           } 
        }else{
            ?>

            <script>
                window.alert("Preencha todos os campos!!")
            </script>
             <?php
        }



        }
      
    }


?>
<?php 
    if(isset($_GET['id_up']))//se a pessoa clicou em editar
    {
        $id_update = addslashes($_GET['id_up']);
        $res= $p ->buscardadosPessoa($id_update);



    }


?>
    <section id= "esquerda">
        <form action="" method="POST">
           <h2>Cadastrar pessoa</h2>
           <label for="nome">Nome</label>
           <input type="text"name="nome" id="nome" value="<?php if(isset
           ($res)){
            echo $res['nome'];
           }?>">
           <label for="telefone">Telefone</label>
           <input type="text" name="telefone"id="telefone" value="<?php if(isset
           ($res)){
            echo $res['telefone'];
           }?>">
           <label for="email">Email</label>
           <input type="text" name="email"id="email"  value="<?php if(isset
           ($res)){
            echo $res['email'];
           }?>">
           <input type="submit" value= "<?php if(isset
           ($res)){
            echo "Atualizar";
          
           }else{
            echo"Cadastrar";
           }?>">
        </form>

    </section>
    <section id ="direita">
    <table>
                <tr id="titulo">
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td colspan="2">Email</td>
                </tr>
        <?php 

            $dados = $p -> buscarDados();
            if(count($dados)>0 )//tem pessoas cadastradas no banco
            {
                for($i = 0 ; $i <count($dados) ; $i++){


                    echo"<tr>";

                    foreach ($dados[$i] as $k => $v) {

                        if($k != "id"){
                                echo"<td>".$v."</td>";
                        }
                    }
                   ?>       <td>
                            <a href="index.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a>
                            <a href="index.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
                        </td> 
                    <?php 
                    echo"</tr>";
                } 
        }
        else{
            ?> 
                <div class="aviso">
                   
                    <h4>Ainda não há pessoas cadastradas</h4>
                </div>
                <?php 
                        }
        
        ?>
       
                
        </table>



    </section>
</body>
</html>
<?php 
    if(isset($_GET['id'])){
        $id= addslashes($_GET['id']);
        $p ->excluir($id);
        header("location:index.php");
    }


?>