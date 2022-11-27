<?php

namespace App;

Class Password{
    private $error;

    public function getError(){
        return $this->error;
    }

    public function validarContrasenna(string $cadena):bool{
        $validez=false;

        if($this->comprobarLongitud($cadena) && $this->comprobarDosNumeros($cadena)) $validez=true;
        return $validez;
    }

    public function comprobarLongitud(string $cadena){
        if (strlen($cadena)>=8) return true;
        else {
            $this->error = "Contraseña muy corta";
            return false;
        }
    }

    public function comprobarDosNumeros(string $cadena){
        $numerosEncontrados = 0;

        foreach (str_split($cadena) as $value){
            if (is_numeric($value)) $numerosEncontrados += 1;
        }
        
        if ($numerosEncontrados>=2) return true;
        else $this->error = "Contraseña no tiene dos números";
    }

}

?>