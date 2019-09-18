<?php
namespace FileWriter\HexagonWriter\Application;

use FileWriter\HexagonWriter\Domain\CommandInterface;

//TODO has to be implemented by MainController
interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}