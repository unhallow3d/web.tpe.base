<?php
    function verificar_autenticacion_middleware($res) {
        if($res->usuario) {
            return;
        } else {
            //header('Location: ' . BASE_URL . 'mostrar_login');
            die("Location");
        }
    }
?>
