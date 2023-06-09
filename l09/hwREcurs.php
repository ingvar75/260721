<?php

const NUMBER = 7;
const STEP = 2;

function multiplication($number, $step ){

    if ($step === 0){
        return $number = 1;
    }
    if ($step == 1){
        return $number;
    }
    --$step;
    //7*7^2
    return $number *= multiplication($number, $step);
}
echo multiplication(NUMBER, STEP);
var_dump(multiplication(NUMBER, STEP));