<?php

final class A
{

}

//class B extends A
//{
//}

$a = new A();
var_dump($a);

class AA
{
    final function test(): void
    {
        echo 'TEST<br>';
    }
}

class BB extends AA
{
//    function test(): void
//    {
//        echo 'TEST 2<br>';
//    }
}

$aa = new AA();
$aa->test();

$bb = new BB();
$bb->test();