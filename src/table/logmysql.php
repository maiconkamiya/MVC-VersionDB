<?php
namespace criativa\base\table;

use criativa\base\DataBase;

class logmysql extends DataBase {
    public function __construct(){
        parent::__construct();

        $this->description = "Tabela log de erro Model";

        $tab_name = self::$prefix . "logmysql";

        $this->cmd[] = array("{$tab_name}",'create','',"CREATE TABLE IF NOT EXISTS `{$tab_name}` (
              `codlog` int(11) NOT NULL AUTO_INCREMENT,
              `descricao` text COLLATE utf8_unicode_ci,
              `sintaxe` text COLLATE utf8_unicode_ci NOT NULL,
              `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
              `dataexc` datetime DEFAULT NULL,
              PRIMARY KEY (`codlog`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        /*Versão*/
        $this->build = 2;
    }
}