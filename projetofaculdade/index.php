
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola de taguatinga</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo.css">
   <?php  include("conexao.php");
  
    ?>
    
</head>

<body>
    <div id="logo">
    <img src="img/log.png" alt="">
    </div>
    <div id="caixa_login">
        <?php 
            if(isset($_POST['entrar'])){
                $usuario = $_POST['usuario'];
                $senha= $_POST['senha'];
                if($usuario==""|| $senha==""){
                    ?><script>window.alert("Preencha todos os campos");</script><?php 
                }else{
                    //VErificar se os campos estao vazios
                     $sql=("SELECT * FROM logar WHERE usuario = '$usuario' AND senha = '$senha'");
                      $resultado= mysqli_query($conexao,$sql); 
                   //puxa a variavel conexao 
                    //VErificar quantas linhas do banco de dados
                
                    if(mysqli_num_rows($resultado)>0)//RESULTADO MAIOR QUE 0 SE EXISTE REGISTRO
                    {
                        //BUSCAR TODO O RESULTADO
                           while($res_1 = mysqli_fetch_assoc($resultado)){
                            $status= $res_1['status'];
                            $usuario= $res_1['usuario'];
                            $senha= $res_1['senha'];
                            $nome= $res_1['nome'];
                            $painel= $res_1['painel'];
                            if($status =='Inativo'){
                                echo"<h2>O usuario esta inativo, impossivel conectar </h2>";
                            } else{
                                session_start();
                                $_SESSION['usuario'] = $usuario;
                                $_SESSION['senha'] = $senha;
                                $_SESSION['nome'] = $nome;
                                $_SESSION['painel'] = $painel;
                                //VERIFICAR QUAL PAINEL O USUARIO SERA DIRECIONADO
                                if($painel =='adm'){
                                    ?>
                                    <script> window.location='adm';</script>
                                 <?php 
                                } 
                            }
                           }
                    }else{
                        echo"<h2>Sem cadastro </h2>";
                        ?>
                        <script> window.location='cadastro.php';</script>
                     <?php 
                    }
            }
        }if(isset($_POST['cadastrar'])){
            ?>
                        <script> window.location='cadastro.php';</script>
                     <?php 
            
        }
        
        ?>
        <form action="" name="formulario" method="post" >
            <table>
                <tr><td><h1>Nome do Usuario</h1></td></tr>
                <tr>
                    <td><input type="text" name="usuario" id=""></td>
                </tr>
                <tr>
                    <td>
                        <h1>Senha:</h1>
                    </td>
                </tr>
                <tr>
                    <td><input type="password" name="senha" id=""></td>
                </tr>
                <tr><td style="padding: 10px;">
                    <input class = "input"type="submit" value="Entrar" id="botao" style="height: 40px;" name="entrar"> 
                    <a href="cadastro.php"> <input class = "input"type="submit" value="Cadastrar" id="botao" style="height: 40px;" name="cadastrar"></a>
                </td></tr>
            </table>
        </form>
    </div>
</body>
</html>