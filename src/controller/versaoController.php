<?php
namespace criativaBase\controller;

use criativa\lib\Controller;
use criativaBase\Version;

class versaoController extends Controller {

    public function __construct(){
        parent::__construct();

        $this->layout = null;
    }

    public function index(){
        $this->view();
    }

    public function install(){
        $this->layout = '_layout';
        $this->view();
    }

    public function getlist(){
        $api = new Version();
        echo json_encode($api->listTable());
    }

    public function check(){
        $pendencia = array();

        $api = new Version();
        foreach ($api->listTable() as $i=>$v){
            if ($v->current <> $v->new){
                $pendencia[] = $v;
            }
        }

        echo json_encode($pendencia);
    }

    public function atualizar(){
        if (isset($_POST['tabela'])){
            $tabela = $_POST['tabela'];

            $exc = new $tabela();
            echo $exc->dbExecute();
        }
    }
}