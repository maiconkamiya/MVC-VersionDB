<?php

namespace criativaBase;

use criativaBase\table\versao;
use criativa\lib\Model;

class Version extends Model {

    public function __construct(){
        parent::__construct();

        if (!$this->existsTable('versao')){
            $table = new versao();
            $table->dbExecute();
        }
    }

    public function listTable(){
        $a = "./src/base/tabela/";

        $namespace_base = DEFINED('NAMESPACE_BASE') ? NAMESPACE_BASE : 'mvc';

        $list = array();
        if (is_dir($a)) {
            if ($dh = opendir($a)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file!= '.' && $file != '..'){
                        $class = "\\{$namespace_base}\\base\\table\\" . str_replace('.php','',$file);
                        //require_once "{$a}{$file}";
                        $exc = new $class();

                        $temp = new \stdClass();
                        $temp->tabela = get_class($exc);
                        $temp->current = $this->get($temp->tabela);
                        $temp->new = $exc->build;
                        $temp->description = $exc->description;
                        $temp->important = $exc->important;
                        $temp->optional = $exc->optional;
                        $temp->status = ($temp->current == $temp->new);

                        $list[] = $temp;
                    }
                }
                closedir($dh);
            }
        }

        return $list;
    }

    public function get($table){
        $query = $this->First($this->Select("SELECT build FROM versao WHERE tabela = '{$table}'"));
        return isset($query->build) ? $query->build : '*';
    }
}