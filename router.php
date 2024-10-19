<?php
require 'config.php';
require 'app/controllers/libros_controlador.php';
require 'app/controllers/autores_controlador.php';
require 'libs/response.php';
require 'app/middlewares/sesion_autenticacion_middleware.php';
require 'app/middlewares/verificar_autenticacion_middleware.php';
require 'app/controllers/login_controlador.php';
require 'app/controllers/error_controlador.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
$res = new respuesta;
$action = 'autores'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

switch ($params[0]) {
    
    
    case 'libros':

        $controlador = new libros_controlador();
        $controlador->mostrarLibros(!empty($params[1]) ? $params[1] : null);
        break;
   
    case 'autores':
        sesion_autenticacion_middleware($res);
        $controlador = new autores_controlador($res);
        $controlador->mostrarAutores();

        break;
    case 'agregar-autor':
        sesion_autenticacion_middleware($res);
        verificar_autenticacion_middleware($res);
        $controlador = new autores_controlador($res);
        $controlador->agregarAutor();
        break;
    case 'borrar-autor':
        if (!empty($params[1])) {
            sesion_autenticacion_middleware($res);
            verificar_autenticacion_middleware($res);
            $controlador = new autores_controlador($res);
            $controlador->eliminarAutor($params[1]);
        }
        break;
    case 'editar-autor':
        if (!empty($params[1])) {
            sesion_autenticacion_middleware($res);
            verificar_autenticacion_middleware($res);
            $controlador = new autores_controlador($res);
            $controlador->editarAutor($params[1]);
        }
        break;
    case 'login':
        $controlador = new login_controlador();
        $controlador->login();
        break;
    case 'logout':
        sesion_autenticacion_middleware($res);
        verificar_autenticacion_middleware($res);
        $controlador = new login_controlador();
        $controlador->logout();
    default:
        $controlador = new error_controlador();
        $controlador->error404();
        break;
}
