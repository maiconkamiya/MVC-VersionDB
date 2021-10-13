<?php
/**
 * Created by PhpStorm.
 * User: Maicon
 * Date: 16/02/2018
 * Time: 15:09
 */
namespace criativaBase\Table;

use criativaBase\database;

class versao extends database {
    public function __construct(){
        parent::__construct();

        $this->description = "Tabela versão do banco de dados";

        $this->cmd[] = array('versao','create','',
            'CREATE TABLE IF NOT EXISTS `versao` (
              `tabela` varchar(75) NOT NULL,
              `descricao` text COLLATE utf8_unicode_ci,
              `dtupdate` datetime DEFAULT NULL,
              `build` int NOT NULL DEFAULT 0,
              PRIMARY KEY (`tabela`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');

        $this->cmd[] = array('versao','add','tabela','ALTER TABLE `versao` ADD `tabela` varchar(75) NOT NULL FIRST;');

        $this->build = 1;
    }
}