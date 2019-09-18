<?php
namespace FileWriter\HexagonWriter\Application;

use FileWriter\HexagonWriter\Domain\Command;

interface CommandBus
{
    public function execute(Command $command);
}