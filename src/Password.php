<?php declare( strict_types = 1 );

namespace App;

Class Password{
    private $error=[null, null, null, null];
    public $posicion=0;

    public function getError(int $pos){
        return $this->error[$pos];
    }

    public function validarContrasenna(string $cadena):bool{
        $condiciones = 0;
        $validez=false;

        if($this->comprobarLongitud($cadena)) $condiciones += 1;
        if($this->comprobarDosNumeros($cadena)) $condiciones += 1;
        if($this->comprobarMayuscula($cadena)) $condiciones += 1;
        if($this->comprobarCaracterEspecial($cadena)) $condiciones += 1;
        if ($condiciones == 4) $validez=true;
        return $validez;
    }

    public function comprobarLongitud(string $cadena):bool{
        if (strlen($cadena)>=8) return true;
        else {
            $this->error[$this->posicion] = "Contraseña muy corta";
            $this->posicion += 1;
            return false;
        }
    }

    public function comprobarDosNumeros(string $cadena):bool{
        $numerosEncontrados = 0;

        foreach (str_split($cadena) as $value){
            if (is_numeric($value)) $numerosEncontrados += 1;
        }
        
        if ($numerosEncontrados>=2) return true;
        else{
            $this->error[$this->posicion] = "Contraseña no tiene dos números";
            $this->posicion += 1;
            return false;
        }
    }

    public function comprobarMayuscula(string $cadena):bool{
        $validez = false;
        
        foreach (str_split($cadena) as $value){
            if (!is_numeric($value) && $value==strtoupper($value)){
                $validez=true;
                break;
            }
        }
        if (!$validez){
            $this->error[$this->posicion] = "No hay mayúsculas";
            $this->posicion += 1;
        }
        return $validez;
    }

    public function comprobarCaracterEspecial(string $cadena):bool{
        $validez = false;
        $pattern = '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/';
        
        foreach (str_split($cadena) as $value){
            if (preg_match($pattern,$value)){
                $validez=true;
                break;
            }
        }
        if (!$validez){
            $this->error[$this->posicion] = "No hay caracteres especiales";
            $this->posicion += 1;
        }
        return $validez;
    }

}

?>