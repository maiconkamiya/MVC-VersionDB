<?php
namespace criativa\base\table;

use criativa\base\DataBase;

class numerador extends DataBase {
    public function __construct(){
        parent::__construct();

        $this->description = "Tabela de numeradores";

        $tab_name = self::$prefix . "numerador";

        $this->cmd[] = array($tab_name,'create','',"CREATE TABLE IF NOT EXISTS `{$tab_name}` (
                              `identificador` varchar(140) NOT NULL,
                              `numeracao` int NOT NULL DEFAULT 1,
                              PRIMARY KEY (`identificador`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        //versão
        $this->build = 1;
    }
}
