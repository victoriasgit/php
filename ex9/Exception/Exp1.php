<?php
namespace Exception;

class Exp1 extends \Exception
{
    public function __toString()
    {
        return "<b>" . end(explode("\\", get_class($this))) . " [{$this->code}]:</b> <i>{$this->message}</i><br>";
    }
}