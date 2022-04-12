<?php
    require_once("Base.class.php");

    class Bolsista extends Base{
        
        public function __construct($fields = array()){
            parent::__construct();

            $this->table = "Bolsista";

            if(sizeof($fields) <= 0){
                $this->value_field = array(
                    "nome"      =>  NULL,
                    "senha"     =>  NULL,
                    "tipo"      =>  NULL
                );
            }
            else{
                $this->value_field  =   $fields;
            }

            $this->pk_field         =   "matricula"
;        }// END OF CONSTRUCT
    }// END OF CLASS BOLSISTA
?>