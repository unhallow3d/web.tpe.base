<?php
require_once 'abstract_controlador.php';
require_once './app/models/usuarios_modelo.php';
require_once './app/views/usuarios_vista.php';
class login_controlador extends abstract_controlador
{
    public function __construct()
    {
        $this->modelo = new usuarios_modelo;
        $this->vista =  new usuarios_vista();
    }
    public function login()
    {
        $error = null;

        if ($_POST) {
            if (empty($_POST['nombre_usuario'] || empty($_POST['clave_usuario']))) {
                $error = 'Falta el nombre del usuario o la contraseña';
            } else {
                $usuarioExistente = $this->modelo->obtenerUsuario($_POST['nombre_usuario'], $_POST['clave_usuario']);
                if (!$usuarioExistente) {
                    
                    $error='Nombre de usuario o contraseña inexistente';
                }
                else{
                    session_start();
                    $_SESSION['ID_USER']= $usuarioExistente->id_usuario;
                    $_SESSION['NAME_USER']= $usuarioExistente->nombre_usuario;
                    $this->redirigir('');
                }
               

            }
        }

        $this->vista->mostrarFormularioLogin($error);
    }
    public function logout() {
        session_start(); 
        session_destroy(); 
        $this->redirigir('');

    }
}
