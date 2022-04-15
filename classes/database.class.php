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

       // $this->connection->query("SET NAMES 'utf8'");
       // $this->connection->query("SET character_set_connection  = utf8");
      //  $this->connection->query("SET character_set_client      = utf8'");
      //  $this->connection->query("SET character_set_results     = utf8'");
        
    }// CONNECT

    public function insert($object){
        $sql    =   "INSERT INTO ".$object->table." (";
        $sql    .=  $object->pk_field.", ";  
        for($i = 0; $i < count($object->value_field); $i++){
            $sql .= key($object->value_field);
            if($i < count($object->value_field) - 1){
                $sql    .=  ", ";
            }
            else{
                $sql    .=  ") ";
            }
            next($object->value_field);
        }

        reset($object->value_field);
        $sql    .=  "VALUES (";
        $sql    .=  $object->pk_value.", ";  
        for($i = 0; $i < count($object->value_field); $i++){

            $sql .= is_numeric($object->value_field[key($object->value_field)]) ?
            $object->value_field[key($object->value_field)] : 
            "'".$object->value_field[key($object->value_field)]."'";

            if($i < count($object->value_field) - 1){
                $sql    .=  ", ";
            }
            else{
                $sql    .=  ") ";
            }
            next($object->value_field);
        }
       // echo($sql);
        return $this->exec_sql($sql);
    }// END OF INSERT

    public function update($object){
        $sql    =   "UPDATE ".$object->table." SET ";

        for($i = 0; $i < count($object->value_field); $i++){
            $sql .= key($object->value_field)."=";

            $sql .= is_numeric($object->value_field[key($object->value_field)]) ?
            $object->value_field[key($object->value_field)] : 
            "'".$object->value_field[key($object->value_field)]."'";

            if($i < count($object->value_field) - 1){
                $sql    .=  ", ";
            }
            else{
                $sql    .=  " ";
            }
            next($object->value_field);
        }

        $sql    .= "WHERE ".$object->pk_field."=";
        $sql    .=  is_numeric($object->pk_value) ? $object->pk_value : "'".$object->pk_value."'";

        echo($sql);
       return $this->exec_sql($sql);
    }//END OF UPDATE

    public function delete($object){
        $sql    =   "DELETE FROM ".$object->table;
        $sql    .= " WHERE ".$object->pk_field."=";
        $sql    .=  is_numeric($object->pk_value) ? $object->pk_value : "'".$object->pk_value."'";

        echo($sql);
       return $this->exec_sql($sql);
    }//END OF DELETE    

    public function select_all($object){
        $sql = "SELECT * FROM ".$object->table;
        if($object->extras_select != NULL){
            $sql    .=  " ".$object->extras_select;
        }
        echo $sql;
        return $this->exec_sql($sql);
    }// END OF SELECT_ALL

    public function select_field($object){
        $sql = "SELECT ";
      
        for($i = 0; $i < count($object->value_field); $i++){
            $sql .= key($object->value_field);
            if($i < count($object->value_field) - 1){
                $sql    .=  ", ";
            }
            else{
                $sql    .=  " ";
            }
            next($object->value_field);
        }
        $sql    .=  "FROM ".$object->table;

        if($object->extras_select != NULL){
            $sql    .=  " ".$object->extras_select;
        }

        echo $sql;
        return $this->exec_sql($sql);
    }//END OF SELECT_FIELD


    public function exec_sql($sql = NULL){
        if($sql != NULL){
           $mysqli_query        =   $this->connection->query($sql) or $this->erro_handling(__FILE__,__FUNCTION__);
           $this->affected_rows =   $this->connection->affected_rows;
           if(substr(trim(strtolower($sql)),0,6) == 'select'){
                $this->dataset  = $mysqli_query;
                return $mysqli_query;
           }
           else{
               return $this->affected_rows;
           }
        }
        else{
            $this->erro_handling(__FILE__,__FUNCTION__,NULL,'Comando SQL não informado na função',FALSE);
        }
    }// END OF EXEC_SQL

    public function return_datas($type = NULL){
        switch (strtolower($type)){
            case "array":
                return $this->dataset->fetch_array();
                break;
            case "assoc":
                return $this->dataset->fetch_assoc();
                break;
            case "object" :
                return $this->dataset->fetch_object();
                break;
            default:
                return $this->dataset->fetch_object();
                break;
        }
    }

    public function erro_handling($file = NULL, $function = NULL, $error_number = NULL, $error_message = NULL, $except_generate = FALSE){
        if($file            == NULL)   $file        = "Não informado";
        if($function        == NULL)   $function    = "Não informada";
        if($error_number    == NULL)   $this->connection->errno;
        if($error_message   == NULL)   $this->connection->error;
    
        $result             =   'Ocorreu um erro com os seguintes detalhes:<br/>
                                <strong>Arquivo:</strong>'.$file.'<br/>
                                <strong>Rotina:</strong>'.$function.'<br/>
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
