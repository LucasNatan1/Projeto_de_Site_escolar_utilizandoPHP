<?php     
       require '../conexao.php';
        require  '../classepessoas.php';
        $p = new Pessoa("escola","localhost","root","");
       
       
      
       
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMPAGINA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
  </head>
  <body >
  <?php 
   //include("../config.php");

  
  ?>
  
  <nav class="navbar col-12 position m-auto navbar-expand-lg bg-dark navbar-dark ">
  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alunos.php">Alunos</a>
        </li>  <li class="nav-item">
          <a class="nav-link" href="professores.php">Professores</a>
        </li>
        </li>  <li class="nav-item">
          <a class="nav-link" href="disciplinas.php">Disciplinas</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link disabled">Sair</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>
<br><br>   
</div>






</form>
<div class="tabelainicio" >
<table class="table" >

  <thead>
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Curso</th>
    </tr>
  
  </thead>
  
  <tbody> 
<form action="" method="post">
  <!--<div class="box-search">-->
        <input type="search" class='form-crontrol w-25' placeholder="Pesquisar " id='pesquisar'name='pesquisar'>
        <button  class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>

  </div>
  </form> 
  <?php 
            $pagina = isset($_GET['pagina']) ? filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT) : 1;
            $listagem =$p-> listarEstudantes($pagina);
            $estudantes = $listagem['estudantes'];
           $paginas = $listagem['paginas'];
    
    

        foreach ($estudantes as $item ) {
            echo"<tr>";
          echo"<td>".$item['id']."</td>";
          echo"<td>".$item['nome']."</td>";
          echo"<td>".$item['email']."</td>";
          echo"<td>".$item['curso']."</td>";
                   
          echo"</tr>";
        }
        // <a href="?pagina=1">Primeira pagina</a>
?>    
<br>
       <?php if($pagina>1):?>
            <a href="?pagina=<?=$pagina-1?>" class="btn btn-primary" role="button"id="botoes" ><<</a>
        <?php endif;?>
        <?=$pagina?>
        <?php if($pagina<$paginas): ?>
           <a href="?pagina=<?=$pagina+1?>" class="btn btn-primary" role="button" id="botoes">>></a>
           <?php endif;?>
  </tbody>
</table>
  
</div>


  </body>
  
</html>
