<?php
/**
 * Created by PhpStorm.
 * User: Maicon
 * Date: 16/02/2018
 * Time: 15:09
 */
namespace criativa\base\table;

use criativa\base\DataBase;

class log_alt_dado extends DataBase {
    public function __construct(){

        parent::__construct();

        $this->description = "Tabela log alteração de dados";

        $tab_name = self::$prefix . "log_alt_dado";

        $this->cmd[] = array("{$tab_name}",'create','',"CREATE TABLE IF NOT EXISTS `{$tab_name}` (
              `codusuario` int NOT NULL,
              `tabela` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
              `campo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
              `valornovo` text COLLATE utf8_unicode_ci NOT NULL,
              `valoranterior` text COLLATE utf8_unicode_ci NOT NULL,
              `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        $this->build = 1;
    }
}
