<?php
namespace FileWriter\Utils;

class InputParser
{
    public function parse(string $data): array
    {
        return explode(" ", $data);
    }
}