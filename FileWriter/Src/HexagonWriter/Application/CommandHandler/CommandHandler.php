<?php
namespace FileWriter\HexagonWriter\Application\CommandHandler;

use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;

class CommandHandler implements CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        // TODO: Implement handle() method.
    }
}