<?php
/**
 * Created by PhpStorm.
 * User: Maicon
 * Date: 16/02/2018
 * Time: 15:09
 */
namespace criativaBase\table;

use criativaBase\DataBase;

class versao extends DataBase {
    public function __construct(){

        parent::__construct();

        $this->description = "Tabela versão do banco de dados";

        $tab_name = self::$prefix . "versao";

        $this->cmd[] = array("{$tab_name}",'create','',"CREATE TABLE IF NOT EXISTS `{$tab_name}` (
              `tabela` varchar(75) NOT NULL,
              `descricao` text COLLATE utf8_unicode_ci,
              `dtupdate` datetime DEFAULT NULL,
              `build` int NOT NULL DEFAULT 0,
              PRIMARY KEY (`tabela`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

        $this->cmd[] = array($tab_name,'add','tabela',"ALTER TABLE `{$tab_name}` ADD `tabela` varchar(75) NOT NULL FIRST;");

        $this->build = 1;

        $this->cmd[] = array('','READSQL', __DIR__ . '/../function/fn_exists_procedure.sql', array(array('ROTINA','fn_exists_procedure')));

        $this->build = 2;
    }
}
