<?php

use App\Password;
use \PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

Class PasswordTest extends TestCase{

    public function testLongitudContrasenna(){
        $password = new Password();
        assertTrue($password->validarContrasenna("12345678"));
    }

    public function testLongitudContrasennaMenor8(){
        $password = new Password();
        assertFalse($password->validarContrasenna("1234567"));
    }

    public function testLongitudContrasennaMenor8Error(){
        $password = new Password();
        $password->validarContrasenna("1234567");
        assertEquals("Contraseña muy corta", $password->getError(0), "No coincide el eror");
    }

    public function testDosNumeros(){
        $password = new Password();
        assertTrue($password->validarContrasenna("12345678"), "No hay dos números");
    }

    public function testUnNumeroError(){
        $password = new Password();
        $password->validarContrasenna("ABCDFGH2");
        assertEquals("Contraseña no tiene dos números", $password->getError(0), "No coincide el error");
    }

    public function testUnNumeroSieteCaracteresDosErrores(){
        $password = new Password();
        $password->validarContrasenna("ABCGH2");
        assertEquals("Contraseña muy corta", $password->getError(0), "No coincide el error");
        assertEquals("Contraseña no tiene dos números", $password->getError(1), "No coincide el error");
    }
}

?>