<?php

use \Exception\Exp1;
use \Exception\Exp2;
use \Exception\Exp3;
use \Exception\Exp4;
use \Exception\Exp5;

class MyGenerator
{
    public function method1()
    {
        throw new Exp1("Exception 1", 1);
    }

    public function method2()
    {
        throw new Exp2("Exception 2", 2);
    }

    public function method3()
    {
        throw new Exp3("Exception 3", 3);
    }

    public function method4()
    {
        throw new Exp4("Exception 4", 4);
    }

    function randomExp()
    {
        $random = random_int(1, 5);

        try {
            switch ($random) {
                case 1:
                    $this->method1();
                    break;
                case 2:
                    $this->method2();
                    break;
                case 3:
                    $this->method3();
                    break;
                case 4:
                    $this->method4();
                    break;
                default:
                    throw new Exp5("Exception 5", 5);
            }
        } catch (\Exception $exception) {
            print( $exception->getMessage() . ": " . $exception->getCode() . "<br>" );
        } finally {
            $random1 = random_int(1, 5);
            while ($random1 == $random) {
                $random1 = random_int(1, 5);
            }
            switch ($random1) {
                case 1:
                    $this->method1();
                    break;
                case 2:
                    $this->method2();
                    break;
                case 3:
                    $this->method3();
                    break;
                case 4:
                    $this->method4();
                    break;
                default:
                    throw new Exp5("Exception 5", 5);
            }
        }


    }


}