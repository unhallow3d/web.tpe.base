<?php
require_once 'abstract_controlador.php';
require_once 'app/views/error_vista.php';
class error_controlador extends abstract_controlador{
    public function __construct()
    {
        $this->vista = new error_vista();
    }
    public function error404(){
        $this->vista->error404();
    }

}