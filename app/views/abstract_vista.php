<?php
abstract class abstract_vista{
    public function mostrarError($mensaje){
        require 'cuadro_error.phtml';
    }
}