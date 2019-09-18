<?php
namespace FileWriter\HexagonWriter\Domain;

/**
 * Interface CommandHandler
 */
interface CommandHandler
{
    /**
     * @param Command $command
     * @return mixed
     */
    public function handle(Command $command);
}