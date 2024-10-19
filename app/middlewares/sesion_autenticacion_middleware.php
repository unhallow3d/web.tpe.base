<?php
    function sesion_autenticacion_middleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->usuario = new stdClass();
            $res->usuario->id = $_SESSION['ID_USER'];
            $res->usuario->nombre_usuario = $_SESSION['NAME_USER'];
            return;
        }
     
    }

