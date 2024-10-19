<?php
require_once 'abstract_vista.php';
class usuarios_vista extends abstract_vista{
public function mostrarFormularioLogin($error=null) {
        
    require 'templates/formulario_login.phtml';
}
}