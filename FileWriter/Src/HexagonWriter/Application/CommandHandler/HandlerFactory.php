<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application\CommandHandler;

use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\Utils\Validator;
use Utils\Config;

/**
 * Class HandlerFactory
 *
 * @package FileWriter\HexagonWriter\Application\CommandHandler
 */
class HandlerFactory
{
    private $command;
    private $config;
    private $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->config = new Config();
    }

    /**
     * @return string
     */
    private function getClassNameWithoutNamespace()
    {
        $commandName = get_class($this->command);
        $commandName = explode("\\", $commandName);
        $commandName = array_reverse($commandName)[0];
        return $commandName;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function makeHandlerClassName()
    {
        $handlerPrefix = $this->config->getHandlerClassPrefix();
        $handlerClassName = $handlerPrefix
            .  $this->getClassNameWithoutNamespace()
            . 'Handler';
        return $handlerClassName;
    }

    public function build(CommandInterface $command)
    {
        $this->command = $command;
        $handlerClassName = $this->makeHandlerClassName();
        $this->validator->validateClassExists($handlerClassName);
        return new $handlerClassName;
    }
}