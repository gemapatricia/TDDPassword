<?php

use App\Password;
use \PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

Class PasswordTest extends TestCase{

    public function testLongitudContrasenna(){
        $password = new Password();
        assertTrue($password->validarContrasenna("12345678"));
    }

    public function testLongitudContrasennaMenor8(){
        $password = new Password();
        assertTrue($password->validarContrasenna("1234567"));
    }

}

?>