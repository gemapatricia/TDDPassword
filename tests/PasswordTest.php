<?php declare( strict_types = 1 );

use App\Password;
use \PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

Class PasswordTest extends TestCase{

    public function testLongitudContrasenna(){
        $password = new Password();
        assertTrue($password->validarContrasenna("12345678A%"));
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
        assertTrue($password->validarContrasenna("12345678A&"), "No hay dos números");
    }

    public function testUnNumero(){
        $password = new Password();
        assertFalse($password->validarContrasenna("ABCDFGH2"), "No devuelve falso");
    }

    public function testUnNumeroError(){
        $password = new Password();
        $password->validarContrasenna("ABCDFGH2");
        assertEquals("Contraseña no tiene dos números", $password->getError(0), "No coincide el error");
    }

    public function testUnNumeroSieteCaracteres(){
        $password = new Password();
        assertFalse($password->validarContrasenna("ABCGH2"), "No devuelve falso");
    }

    public function testUnNumeroSieteCaracteresPrimerError(){
        $password = new Password();
        $password->validarContrasenna("ABCGH2");
        assertEquals("Contraseña muy corta", $password->getError(0), "No coincide el error");
    }

    public function testUnNumeroSieteCaracteresSegundoError(){
        $password = new Password();
        $password->validarContrasenna("ABCGH2");
        assertEquals("Contraseña no tiene dos números", $password->getError(1), "No coincide el error");
    }

    public function testUnaMayusucula(){
        $password = new Password();
        assertTrue($password->validarContrasenna("A34qqqqqq%"), "No devuelve verdadero");
    }

    public function testNoMayusucula(){
        $password = new Password();
        assertFalse($password->validarContrasenna("q34qqqqqq"), "No devuelve falso");
    }

    public function testNoMayusuculaError(){
        $password = new Password();
        $password->validarContrasenna("q34qqqqqq");
        assertEquals("No hay mayúsculas", $password->getError(0), "No coincide el error");
    }

    public function testMenor8NoNumerosNoMayusuculaPrimerError(){
        $password = new Password();
        $password->validarContrasenna("qtruv");
        assertEquals("Contraseña muy corta", $password->getError(0), "No coincide el error");
    }

    public function testMenor8NoNumerosNoMayusuculaSegundoError(){
        $password = new Password();
        $password->validarContrasenna("qtruv");
        assertEquals("Contraseña no tiene dos números", $password->getError(1), "No coincide el error");
    }

    public function testMenor8NoNumerosNoMayusuculaTercerError(){
        $password = new Password();
        $password->validarContrasenna("qtruv");
        assertEquals("No hay mayúsculas", $password->getError(2), "No coincide el error");
    }

    public function testCaracteresEspeciales(){
        $password = new Password();
        assertTrue($password->validarContrasenna("16Yaswu$"), "No devuelve true");
    }
}

?>