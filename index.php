<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>projeto</title>
</head>
<body>
    <?php
        require_once("classes/Bolsista.class.php");
        $bolsista = new Bolsista(array(
            "nome" => "chords",
            "tipo"  => "1"
        ));
        $bolsista->pk_value =   "20140146005";
       // $bolsista->insert($bolsista);
       /* $bolsista->delete($bolsista);
        echo('<pre>');
        print_r($bolsista);
        echo('</pre>');
       */
       // $bolsista->extras_select = "ORDER BY matricula DESC";
      //  $bolsista->select_all($bolsista);
      $bolsista->add_field($bolsista->pk_field);
        $bolsista->select_field($bolsista);

       echo '<br>';    

      /* while($res   =   $bolsista->return_datas()){
           echo $res->matricula." | ".$res->nome." | ".$res->senha." | ".$res->tipo."<br/>";
       }*/

       while($res   =   $bolsista->return_datas()){
        echo $res->matricula." | ".$res->nome." | ".$res->tipo."<br/>";
       }
        ?>
    <h2>Login</h2>
    <form action="test.php" target="_parent" method="post">
        <label for="POST-matricula">Matricula</label>
        <input id="POST-matricula" type="text" name="matricula" placeholder="Digite a matricula aqui">
        
        <br />

        <label for="POST-senha">Senha</label>
        <input id="POST-senha" type="password" name="senha" placeholder="Digite a senha aqui">
        
        <br />
        <input type="submit" value="Entrar">
    </form>
</body>
</html>