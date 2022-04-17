<?php 

    require_once('classes/Usuario.class.php');
    $usuario    = new Usuario(array(
        'matricula' =>  $_POST['typeMatriculaX'],
        'senha'     =>  $_POST['typePasswordX']
    ));
    
   // $usuario->select_all($usuario);
    $usuario->extras_select = 'WHERE matricula = '.$usuario->value_field['matricula'];
    $usuario->select_field($usuario);
    echo '<hr>';
    $res  =   $usuario->return_datas();
    if($res == NULL){
        echo '<h1>NULL</h1>';
    }
    else{
        echo $res->matricula." | ".$res->senha.'<br/>';
    }

    echo('<pre>');
    print_r($usuario);
    echo('</pre>');

?>