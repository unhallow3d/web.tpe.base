<?php
require_once 'abstract_vista.php';
class libros_vista extends abstract_vista{
   
    public function mostrarLibros($lista_libros, $info_autor=null){
        $cantidad=count($lista_libros);
        
        require 'templates/lista_libros.phtml';
    }
    
}