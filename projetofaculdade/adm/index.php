
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
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
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
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/portalalu.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/familia.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/recesso.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <div class="botao">
 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

  </div>
 
</div>
</div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

    