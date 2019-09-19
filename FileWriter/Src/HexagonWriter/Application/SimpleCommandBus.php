<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application;

use Exception;
use FileWriter\HexagonWriter\Application\CommandHandler\HandlerFactory;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;

/**
 * Class SimpleCommandBus.
 * Find the right handler, executes command.
 *
 * @package FileWriter\HexagonWriter\Application
 */
class SimpleCommandBus implements CommandBusInterface
{
    private $handlerFactory;

    public function __construct()
    {
        $this->handlerFactory = new HandlerFactory();
    }

    /**
     * Finds the right handler, by command name.
     *
     *
     * @param CommandInterface $command
     * @return CommandHandlerInterface|\Exception
     * @throws Exception
     */
    public function resolveHandler(CommandInterface $command)
    {
        return $this->handlerFactory->build($command);
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     * @throws Exception
     */
    public function execute(CommandInterface $command)
    {
        return $this->resolveHandler($command)->handle($command);
    }
}