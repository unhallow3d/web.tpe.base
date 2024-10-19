<?php
require_once 'abstract_controlador.php';
require_once './app/models/autores_modelo.php';
require_once './app/views/autores_vista.php';
class autores_controlador extends abstract_controlador
{

    public function __construct($res)
    {

        $this->modelo = new autores_modelo;
        $this->vista = new autores_vista($res ? $res->usuario : null); // si $res!=false hago $res->usuario, sino null
    }
    public function mostrarAutores()
    {
        $autores = $this->modelo->obtenerAutores();
        $this->vista->mostrarAutores($autores);
    }
    public function agregarAutor()
    {   
        $error = null;
        $mensaje = null;
        if ($_POST) {
            
            if (empty($_POST['nombre_autor'])) {
                $error = 'Falta el nombre del autor';
            } else {
                $foto = null;
                if (!empty($_FILES['archivo_foto']['name'])) {
                    if (!$this->validarFotoAutor($_FILES['archivo_foto'])) {
                        $error = 'Solo se permiten imagenes jpeg, jpg o png';
                    } else
                        $foto = $this->obtenerFotoAutor($_FILES['archivo_foto']);
                }
                if(!$error){
                $this->modelo->agregarAutor($_POST['nombre_autor'], $_POST['nacionalidad'], $foto);
                $mensaje = 'Autor agregado';
            }
            }
        }
        $this->vista->mostrarFormularioAutor('agregar-autor', null, $error, $mensaje);
        // $this->modelo->agregarAutor();
        // $this->mostrarAutores();  
    }
    public function editarAutor($id)
    {
        $error = null;
        $autorExistente=null;
        if ($_POST) {
            if (empty($_POST['nombre_autor'])) {
                $error = 'Falta el nombre del autor';
            } else {
                $foto = null;
                if (!empty($_FILES['archivo_foto']['name'])) {
                    if (!$this->validarFotoAutor($_FILES['archivo_foto'])) {
                        $error = 'Solo se permiten imagenes jpeg, jpg o png';
                    } else
                        $foto = $this->obtenerFotoAutor($_FILES['archivo_foto']);
                }
                if (!$error) {
                    $this->modelo->editarAutor($id, $_POST['nombre_autor'], $_POST['nacionalidad'], $foto);
                    $this->redirigir('autores');
                }
            }
        } else {
            $autorExistente = $this->modelo->obtenerAutor($id);
            if (!$autorExistente) {
                $this->vista->mostrarError('Autor inexistente');
                return;
            }
        }

        $this->vista->mostrarFormularioAutor('editar-autor/' . $id, $autorExistente, $error);
    }
    public function eliminarAutor($id)
    {
        if ($id > 0) {
            $autorExistente = $this->modelo->obtenerAutor($id);
            if ($autorExistente) {
                $this->modelo->eliminarAutor($id);
                unlink($autorExistente->archivo_foto);
                $this->redirigir('autores');
            } else {
                $this->vista->mostrarError('El autor no existe.');
            }
        }
    }
    protected function obtenerFotoAutor($infoArchivo)
    {
        $archivoRuta = 'images/' . uniqid("", true) . "."
            . strtolower(pathinfo($infoArchivo['name'], PATHINFO_EXTENSION));
        move_uploaded_file($infoArchivo["tmp_name"], $archivoRuta);
        return $archivoRuta;
    }
    protected function validarFotoAutor($infoArchivo)
    {
        return  $infoArchivo['type'] == "image/jpg" || $infoArchivo['type'] == "image/jpeg" || $infoArchivo['type'] == "image/png";
    }
}
