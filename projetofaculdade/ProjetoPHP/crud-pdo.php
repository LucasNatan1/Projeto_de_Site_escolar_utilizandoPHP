<?php 


//CONEXAO DO BANCO DE DADOS COM PHP
//try {
 // $pdo = new PDO("mysql:dbname=crudpdo;host=localhost", "root","");
//} catch (PDOException $e) {
 // echo "Erro com banco de dados: " .$e->getMessage();
//} catch(Exception $e ){
/// echo"Erro generico".$e->getMessage();

//}

//DBname
//Host
//Usuario
//Senha
//-----------------------------INSERT-----------------------------------------//

// 1 forma :
 //$res = $pdo-> prepare("INSERT INTO pessoa(nome , telefone, email ) VALUES (:n,:t,:e)");

    //$res -> bindValue(":n","Miriam");
    //$res -> bindValue(":t","21992054379");
    //$res -> bindValue(":e","malucoquechato@gmail.com");
    
     //$res -> execute();
// bindvalue aceita passado diretamente e variasveis 

                                    // $nome= "miriam";
                                    // $res-> bindParam(":n",$nome);
//aceita so variaveis 

// 2 forma : 
 //$pdo->query("INSERT INTO pessoa(nome , telefone, email ) VALUES ('lucas','219900231','teste@gmail.com')");




//-----------------------------DELETE ----------------------------------------//

//$cmd = $pdo -> prepare("DELETE FROM pessoa WHERE id = :id ");
//$id= 3;
//$cmd->bindValue(":id",$id);
//$cmd->execute();

//ou


//$res = $pdo -> query("DELETE FROM pessoa WHERE id = '4' ");


//-----------------------------UPDATE----------------------------------------//
//$cmd = $pdo ->prepare("UPDATE pessoa SET email= :e WHERE id = :id");
//$cmd -> bindValue(":e","miriam@gmail.com");
//$cmd -> bindValue(":id",1);
//$cmd->execute();

//$res = $pdo -> query("UPDATE pessoa SET email = 'teste@gmail.com' WHERE id = 1");
//$res = $pdo -> query("UPDATE pessoa SET nome = 'Lucas' WHERE id = 1");


//-----------------------------SELECT----------------------------------------//
//$cmd =$pdo ->prepare("SELECT * FROM pessoa WHERE id = :id");
//$cmd ->bindValue(":id",1);
//$//cmd -> execute();
//$r//es = $cmd -> fetch(PDO::FETCH_ASSOC);
//ou
//$cmd ->fetchAll();
//seleciona a porra toda
//foreach ($res as $key => $value) {
 // echo $key." : " .$value . " <br>";
//}


?>