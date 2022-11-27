<?php

namespace App;

Class Password{

    public function validarContrasenna(string $cadena){
        if (strlen($cadena)>=8) return true;
    }
}

?>