<?php 
         require  '../classepessoas.php';
        $p = new Pessoa("escola","localhost","root","");
        $painel_atual='adm';
       
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
<div class="tabelainicio">
  <table class="table">

    <thead>
      <tr>
        <th scope="col">Matricula</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Disciplina</th>
       
      </tr>
    </thead>
    <tbody>
      <?php 
       $materias = $p -> buscarmateriastodo();
     
       
foreach ($materias as $materias) {

  
    echo '<input type="checkbox" name="materias[]" value="' . $materias['id'] . '">' . $materias['nome'] . ' ---------------';
    if('materias[]'=='Matemática'){
      for($i = 0 ; $i <count($materias) ; $i++){


        echo"<tr>";

        foreach ($materias[$i] as $k => $v) {

            
                    echo"<td>".$v."</td>";
            
        }
      
        echo"</tr>";
    } 
    }
  
  }
        
          
        
      ?>
    </tbody>
  </table>
</div>

  

  </body>
</html>
