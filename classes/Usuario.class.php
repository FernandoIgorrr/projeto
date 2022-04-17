<?php
    require_once("Base.class.php");

    class Usuario extends Base{
        
        public function __construct($fields = array()){
            parent::__construct();

            $this->table = "Usuario";

            if(sizeof($fields) <= 0){
                $this->value_field = array(
                    "id"        =>  NULL,
                    "matricula" =>  NULL,
                    "senha"     =>  NULL,
                    "tipo"      =>  NULL
                );
            }
            else{
                $this->value_field  =   $fields;
            }

            $this->pk_field         =   "id";
        }// END OF CONSTRUCT
    }// END OF CLASS BOLSISTA
?>