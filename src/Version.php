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
                        $list[] = $this->_object($class);
                    }
                }
                closedir($dh);
            }
        }

        $b = "./vendor/mtakeshi/";

        if (is_dir($b)) {
            if ($dh = opendir($b)) {
                while (($dir = readdir($dh)) !== false) {
                    if ($dir!= '.' && $dir != '..'){

                        $default = $b . $dir . "/src/Table/";
                        if (is_dir($default)) {
                            echo __DIR__ . "<br>";
                            echo $default . "<br>";
                            if ($fh = opendir($default)) {
                                while (($file = readdir($fh)) !== false) {
                                    if ($file != '.' && $file != '..') {

                                        $namespace = $this->_extract_namespace($b . $file);
                                        $class = "{$namespace}\\" . str_replace('.php', '', $file);
                                        $list[] = $this->_object($class);

                                    }
                                }
                                closedir($dh);
                            }
                        }
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

    private function _object( $class ){
        $exc = new $class();

        $temp = new \stdClass();
        $temp->tabela = get_class($exc);
        $temp->current = $this->get($temp->tabela);
        $temp->new = $exc->build;
        $temp->description = $exc->description;
        $temp->important = $exc->important;
        $temp->optional = $exc->optional;
        $temp->status = ($temp->current == $temp->new);

        return $temp;
    }

    private function _extract_namespace($file) {
        $ns = NULL;
        $handle = fopen($file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (strpos($line, 'namespace') === 0) {
                    $parts = explode(' ', $line);
                    $ns = rtrim(trim($parts[1]), ';');
                    break;
                }
            }
            fclose($handle);
        }
        return $ns;
    }
}