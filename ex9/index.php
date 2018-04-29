<?php

use Generator\MyGenerator;

spl_autoload_register(function ($class) {
    require_once __DIR__ . "/" . str_replace("\\", "/", $class) . ".php";
});

$MyGenerator = new MyGenerator();

try {
    $MyGenerator->method1();
} catch (\Exception\Ex1 $e) {
    print $e->getMessage();
} catch (\Exception\Ex2 $e) {
    print $e->getMessage();
} catch (\Exception\Ex3 $e) {
    print $e->getMessage();
} catch (\Exception\Ex4 $e) {
    print $e->getMessage();
} catch (\Exception\Ex5 $e) {
    print $e->getMessage();
} finally {
    print " on method1." . "\n";
}

try {
    $MyGenerator->method2();
} catch (\Exception\Ex1 $e) {
    print $e->getMessage();
} catch (\Exception\Ex2 $e) {
    print $e->getMessage();
} catch (\Exception\Ex3 $e) {
    print $e->getMessage();
} catch (\Exception\Ex4 $e) {
    print $e->getMessage();
} catch (\Exception\Ex5 $e) {
    print $e->getMessage();
} finally {
    print " on method2." . "\n";
}

try {
    $MyGenerator->method3();
} catch (\Exception\Ex1 $e) {
    print $e->getMessage();
} catch (\Exception\Ex2 $e) {
    print $e->getMessage();
} catch (\Exception\Ex3 $e) {
    print $e->getMessage();
} catch (\Exception\Ex4 $e) {
    print $e->getMessage();
} catch (\Exception\Ex5 $e) {
    print $e->getMessage();
} finally {
    print " on method3." . "\n";
}

try {
    $MyGenerator->method4();
} catch (\Exception\Ex1 $e) {
    print $e->getMessage();
} catch (\Exception\Ex2 $e) {
    print $e->getMessage();
} catch (\Exception\Ex3 $e) {
    print $e->getMessage();
} catch (\Exception\Ex4 $e) {
    print $e->getMessage();
} catch (\Exception\Ex5 $e) {
    print $e->getMessage();
} finally {
    print " on method4." . "\n";
}

