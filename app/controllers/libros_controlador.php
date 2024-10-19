<?php
require_once 'abstract_controlador.php';
require_once './app/models/libros_modelo.php';
require_once './app/views/libros_vista.php';
class libros_controlador extends abstract_controlador{
    public function __construct()
    {
        $this->modelo=new libros_modelo;
        $this->vista=new libros_vista;  
    }
    public function mostrarLibros($id_autor = null){
        $info_autor=null;

        if($id_autor){
            $modelo_autor= new autores_modelo;
            $info_autor= $modelo_autor->obtenerAutor($id_autor);
        }
        $libros=$this->modelo->obtenerLibros($id_autor);
        $this->vista->mostrarLibros($libros, $info_autor);
    }
}
