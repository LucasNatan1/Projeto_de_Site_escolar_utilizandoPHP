<?php 
   require_once'classepessoas.php';
  $p = new Pessoa("escola","localhost","root","");
  ?>
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
       if(isset($_POST['cadastrar'])) 
           {  $nome = addslashes($_POST['nome']);
           $usuario = addslashes($_POST['usuario']);
           $senha= addslashes($_POST['senha']);
           ?>
              
                        <script>  
                        window.alert="email cadastrado com sucesso";
                        window.location='index.php';
                       
                        </script>
                    
           <?php 
           if(!empty($nome)&&!empty($usuario)&&!empty($senha)){
              if(!$p->cadastrarPessoa($nome,$usuario,$senha)){
               ?>
   
               <script>
                   window.alert("Email ja cadastrado!!")
               </script>
                <?php
              } 
           }else{
           
           }
   
        }
         
       

        
    
    
    ?>
        
      
        <form action="" name="formulario" method="post" >
            <table>
            <tr><td><h1>Nome :</h1></td></tr>
                <tr>
                    <td><input type="text" name="nome" id=""></td>
                </tr>
                <tr>
                <tr><td><h1>Nome do Usuario:</h1></td></tr>
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

                    <input class = "input"type="submit" value="Cadastrar" id="botao" style="height: 40px;" name="cadastrar">

                </td></tr>
            </table>
        

    </div>
</body>
</html>