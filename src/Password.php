<?php

namespace App;

Class Password{

    public function validarContrasenna(string $cadena):bool{
        if (strlen($cadena)>=8) return true;
        else {
            return false;
        }
    }
}

?>