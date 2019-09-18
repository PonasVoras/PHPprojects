<?php
namespace FileWriter\HexagonWriter\Application\Command;

use FileWriter\HexagonWriter\Domain\CommandInterface;

class WriteConfigCommand implements CommandInterface
{
    public function writeData():array
    {
        $data = array(
            'data' => $data
        );
        echo "I am the write command";
        var_dump($data);
        return $data;
    }
    //TODO read data from userFile.txt
}