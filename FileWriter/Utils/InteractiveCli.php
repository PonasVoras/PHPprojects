<?php
namespace Utils;

class InteractiveCli
{
    public function requestData(): string
    {
        $data = trim(fgets(STDIN));
        return $data;
    }
}