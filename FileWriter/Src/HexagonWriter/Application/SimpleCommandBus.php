<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/18/2019
 * Time: 9:02 PM
 */

namespace FileWriter\HexagonWriter\Application;


use Exception;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;
use Utils\Config;


class SimpleCommandBus implements CommandBusInterface
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    // TODO finds the appropriate handler and returns it

    /**
     * @param CommandInterface $command
     * @return CommandHandlerInterface|\Exception
     * @throws Exception
     */
    public function resolveHandler(CommandInterface $command)
    {
        // TODO make it use the the factory
        $commandName = get_class($command);
        $commandName = explode("\\", $commandName);
        $commandName = array_reverse($commandName)[0];

        $handlerPrefix = $this->config->getHandlerClassPrefix();
        $handlerName = $handlerPrefix .  $commandName . 'Handler';

        if (class_exists($handlerName)){
            return new $handlerName;
        } else {
            throw new Exception($handlerName . ' Handler does not exist');
        }

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