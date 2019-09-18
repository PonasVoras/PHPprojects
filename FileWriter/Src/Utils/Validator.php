<?php
namespace FileWriter\Utils;

class Validator
{
    //TODO validate parameters
    public function validateParameters(array $parameters)
    {
        if(empty($parameters) || empty($parameters[0]) || empty($parameters[1])){
            throw new \Exception('Invalid input parameters');
        }
    }
}