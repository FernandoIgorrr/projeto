<?php

abstract class Database{
    public $server          =   "localhost";
    public $user            =   "figor";
    public $password        =   "755CcmJm80kuAyhV";
    public $database_name   =   "projeto";
    public $connection      =   NULL;
    public $dataset         =   NULL;
    public $affected_rows   =   -1;

    //METHODS

    public function __construct(){
        $this->connect();
        echo("asdadasd");
    }// END OF CONSTRUCTOR

    public function __destruct(){
        if($this->connection != NULL){
           $this->connection->close();
        }
    }// END OF DESTRUCT

    public function connect(){

        $this->connection    =   new mysqli($this->server, $this->user, $this->password, $this->database_name);
       
        if ($this->connection->connect_errno) {
           // echo "Failed to connect to MySQL: (" . $this->connection->connect_errno . ") " . $this->connection->connect_error;
            $this->erro_handling(__FILE__,__FUNCTION__,$this->connection->connect_errno,$this->connection->connect_error,TRUE);
        }
        //echo $this->connection->host_info . "\n";

        $this->connection->query("SET NAMES 'utf8'");
        $this->connection->query("SET character_set_connection  = utf8");
        $this->connection->query("SET character_set_client      = utf8'");
        $this->connection->query("SET character_set_results     = utf8'");
        
    }// CONNECT


    public function erro_handling($file = NULL, $rotine = NULL, $error_number = NULL, $error_message = NULL, $except_generate = FALSE){
        if($file            == NULL)   $file    = "Não informado";
        if($rotine          == NULL)   $rotine  = "Não informada";
        if($error_number    == NULL)   $this->connection->errno();
        if($error_message   == NULL)   $this->connection->error();
    
        $result             =   'Ocorreu um erro com os seguintes detalhes:<br/>
                                <strong>Arquivo:</strong>'.$file.'<br/>
                                <strong>Rotina:</strong>'.$rotine.'<br/>
                                <strong>Código:</strong>'.$error_number.'<br/>
                                <strong>Mensagem:</strong>'.$error_message;
        
        if($except_generate == FALSE){
            echo($result);
        }
        else{
            die($result);
        }
    
    }

}// END OF DATABASE CLASS

?>
