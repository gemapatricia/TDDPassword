<?php

namespace App;

Class Password{
    private $error;

    public function getError(){
        return $this->error;
    }

    public function validarContrasenna(string $cadena):bool{
        if (strlen($cadena)>=8) return true;
        else {
            $this->error = "Contraseña muy corta";
            return false;
        }
    }
}

?>