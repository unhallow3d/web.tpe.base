<?php
require_once 'abstract_vista.php';
class autores_vista extends abstract_vista{
    private $usuario;
    public function __construct($usuario)
    {
        $this->usuario=$usuario;
    }
    public function mostrarAutores($lista_autores){
        $cantidad=count($lista_autores);
        require 'templates/lista_autores.phtml';
    }
    public function mostrarError($error) {
        
        require 'templates/cuadro_error.phtml';
    }
    public function mostrarFormularioAutor($accion, $autor = null, $error=null, $mensaje=null) {
        
        require 'templates/formulario_autor.phtml';
    }
}