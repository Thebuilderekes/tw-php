<?php

class Validator
{

    public function string($value){
       $value = trim($value);
       return strlen($value) > 0;
    } 

}
