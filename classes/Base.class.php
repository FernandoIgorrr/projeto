<?php
    require_once("Database.class.php");

    abstract class Base extends Database{
        public $table           =   "";
        public $value_field     =   array();
        public $pk_field        =   NULL;
        public $pk_value        =   NULL;
        public $extras_select   =   "";


        //METHODS

        public function add_field($field = NULL, $value = NULL){
            if($field != NULL){
                $this->value_field[$field]  = $value;
            }
        }
        
        public function delete_field($field = NULL){
            if(array_key_exists($field,$this->field_value)){
                unset($this->field_value[$field]);
            }
        }

        
        public function set_value($field = NULL, $value = NULL){
            if($field != NULL && $value != NULL){
                $this->value_field[$field]  = $value;
            }
        }

        public function get_value($field = NULL){
            if($field != NULL && array_key_exists($field,$this->value_field)){
                return $this->value_field[$field];
            }
            else{
                return FALSE;
            }
        }
    }
?>