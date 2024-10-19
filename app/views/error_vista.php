<?php
require_once 'abstract_vista.php';
class error_vista extends abstract_vista{
    public function error404(){
        require 'templates/404.phtml';
    }
}