<?php
namespace criativaBase\api;

use criativa\lib\Model;
use criativaBase\object\Numerador;

class ApiNumerador extends Model {

    private $tab_name;

    public function __construct(){
        parent::__construct();

        $this->tab_name = self::$prefix . "numerador";
    }

    public function get(Numerador $obj){
        $this->setObject($obj, $this->First($this->Select("SELECT * FROM {$this->tab_name} WHERE identificador = '{$obj->identificador}'")));
    }

    public function getlist(Numerador $obj){
        $sql = "SELECT t.* FROM {$this->tab_name} t WHERE 1=1 ";

        $sql .= $this->where($obj);

        return $this->Select($sql);
    }

    public function set(Numerador $obj){
        $this->Update(array('numeracao'=>$obj->numeracao), array('identificador'=>$obj->identificador), $this->tab_name);
    }
}