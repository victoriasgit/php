<?php
namespace Generator;

use \Exception\Exp1;
use \Exception\Exp2;
use \Exception\Exp3;
use \Exception\Exp4;
use \Exception\Exp5;

class MyGenerator
{
    public function method1()
    {
        if (true) {
            throw new Exp1("Exception 1");
        }
        throw new Exp2("Exception 2");
    }

    public function method2()
    {
        if (true) {
            throw new Exp2("Exception 2");
        }
        throw new Exp3("Exception 3");
    }

    public function method3()
    {
        if (true) {
            throw new Exp3("Exception 3");
        }
        throw new Exp4("Exception 4");
    }

    public function method4()
    {
        if (true) {
            throw new Exp4("Exception 4");
        }
        throw new Exp5("Exception 5");
    }

    function randomExp(){
        try {
            $random = random_int(1, 5);
            $this->anotherRandomExp($random);
        } catch (\Exception $e) {
            echo $e;
        } finally {
            $this->anotherRandomExp($random);
        }

        switch ($random) {
            case 1:
                return method1();
                break;
            case 2:
                return new method2();
                break;
            case 3:
                return new method3();
                break;
            case 4:
                return new method4();
                break;
            case 5:
                return new method5();
                break;
            default:
                return new method1();
        }
    }

    function anotherRandomExp($prev){
        try {
            $random = random_int(1, 5);
        } catch (\Exception $e) {
            echo $e;
        }
        while ($random == $prev) {
            try {
                $random = random_int(1, 5);
            } catch (\Exception $e) {
                echo $e;
            }
        }
    }
}