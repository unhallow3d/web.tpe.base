<?php

abstract class abstract_controlador{
    protected $vista;
    protected $modelo;
    protected function redirigir($url){
        header('Location: ' . BASE_URL . $url);
        exit();
    }
}