<?php 
   // $db=mysqli_connect("localhost","root","");
 //$conexao = mysqli_select_db('escola');
  //  $pdo = new PDO("mysql:dbname=escola;host=localhost", "root","");
 function conectar(){
  $hostname= "localhost";
  $bancodedados = "escola";
  $usuario = "root";
  $senha ="";
  $mysqli = new mysqli($hostname,$usuario,$senha,$bancodedados);
  return $mysqli;
 }
 $conexao = conectar();
 
?>