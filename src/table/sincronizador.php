<?php
namespace criativaBase\table;

use criativaBase\DataBase;

class versao extends DataBase {
    public function __construct(){

        parent::__construct();

        $this->description = "Tabela de sincronizador";

        $tab_name = self::$prefix . "sincronizador";

        $this->cmd[] = array("{$tab_name}",'create','',"CREATE TABLE IF NOT EXISTS `{$tab_name}` (
              `identificador` varchar(140) NOT NULL,
              `dataexec` datetime DEFAULT NULL,
              PRIMARY KEY (`identificador`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        $this->build = 1;
    }
}
