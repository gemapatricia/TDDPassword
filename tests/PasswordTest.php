<?php 

use \PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

Class PasswordTest extends TestCase{

    public function testLongitudContrasenna(){
        $password = new Contrasenna();
        assertTrue($password->validarContrasenna("12345678"));
    }

}

?>