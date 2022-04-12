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
            mysqli_close($this->connection);
        }
    }// END OF DESTRUCT

    public function connect(){

        $this->connection    =   new mysqli($this->server, $this->user, $this->password, $this->database_name);
       
        if ($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->connection->connect_errno . ") " . $this->connection->connect_error;
        }
        echo $this->connection->host_info . "\n";

        $this->connection->query("SET NAMES 'utf8'");
        $this->connection->query("SET character_set_connection  = utf8");
        $this->connection->query("SET character_set_client      = utf8'");
        $this->connection->query("SET character_set_results     = utf8'");
        
    }// CONNECT

}// END OF DATABASE CLASS

?>
