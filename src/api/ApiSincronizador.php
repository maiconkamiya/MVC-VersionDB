<?php
namespace criativa\base\api;

use criativa\lib\Model;
use criativa\base\object\Sincronizador;

class ApiSincronizador extends Model {

    private $tab_name;

    public function __construct(){
        parent::__construct();

        $this->tab_name = self::$prefix . "sincronizador";
    }

    public function get(Sincronizador $obj){
        $this->_exists($obj);

        $query = $this->First($this->Select("SELECT date_format(dataexec, '%d/%m/%Y %H:%i:%s') dataexec FROM {$this->tab_name} WHERE identificador = '{$obj->identificador}'"));
        return $query->dataexec;
    }

    public function set(Sincronizador $obj){
        $this->Update(array('dataexc'=>date('Y-m-d H:i:s')), array('identificador'=>$obj->identificador), $this->tab_name);
    }

    private function _exists(Sincronizador $obj){
        $query = $this->Select("SELECT dataexec FROM {$this->tab_name} WHERE identificador = '{$obj->identificador}'");

        if (count($query)==0){
            $this->Insert(array('identificador'=>$obj->identificador, 'dataexec'=>'2000-01-01 00:00:00'),$this->tab_name);
        }
    }
}