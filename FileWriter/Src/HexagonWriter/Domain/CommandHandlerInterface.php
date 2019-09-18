<?php
namespace FileWriter\HexagonWriter\Domain;

/**
 * Interface CommandHandler
 */
interface CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function handle(CommandInterface $command);
}