<?php

function include_classes ($class) {
    require_once $class . ".php";
}

spl_autoload_register("include_classes");

$MyGenerator = new MyGenerator();

for ($i = 0; $i < 5; $i++) {

    try {
        $MyGenerator->randomExp();
    } catch (\Exception\Exp5 $e) {
        print ( $e->getMessage() . ": " . $e->getCode() . "<br>" );
    } catch (\Exception\Exp4 $e) {
        print ( $e->getMessage() . ": " . $e->getCode() . "<br>" );
    } catch (\Exception\Exp3 $e) {
        print ( $e->getMessage() . ": " . $e->getCode() . "<br>" );
    } catch (\Exception\Exp2 $e) {
        print ( $e->getMessage() . ": " . $e->getCode() . "<br>" );
    } catch (\Exception\Exp1 $e) {
        print ( $e->getMessage() . ": " . $e->getCode() . "<br>" );
    } finally {
        print "<br>";
    }
}
