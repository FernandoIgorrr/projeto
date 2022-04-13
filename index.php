<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("classes/Bolsista.class.php");
        $bolsista = new Bolsista(array(
            "nome" => "chords",
            "senha" => "testes",
            "tipo"  => "1"
        ));
        $bolsista->pk_value =   "20140146005";
        $bolsista->insert($bolsista);
       /* $bolsista->delete($bolsista);
        echo('<pre>');
        print_r($bolsista);
        echo('</pre>');
       */
        
       $bolsista->select_all($bolsista);
       echo '<br>';    

       while($res   =   $bolsista->return_datas()){
           echo $res->matricula." | ".$res->nome." | ".$res->senha." | ".$res->tipo."<br/>";
       }

    ?>
</body>
</html>