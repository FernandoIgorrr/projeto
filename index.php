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
            "nome" => "Fernando",
            "senha" => "kkllkkllkkl",
            "tipo"  => "2"
        ));

        echo '<pre>';
        print_r($bolsista);
        echo '</pre>';

    ?>
</body>
</html>