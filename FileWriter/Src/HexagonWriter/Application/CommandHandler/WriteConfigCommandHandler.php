<?php
namespace FileWriter\HexagonWriter\Application\CommandHandler;

use Exception;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\HexagonWriter\Domain\WriteFormatManagement\FormatFactory;
use Utils\Config;

class WriteConfigCommandHandler implements CommandHandlerInterface
{
    private $config;
    private $formatFactory;

    public function __construct()
    {
        $this->config = new Config();
        $this->formatFactory = new FormatFactory();
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     * @throws Exception
     */
    public function handle(CommandInterface $command)
    {
        $writeFilename = $this->config->getOutputFileBaseDir();
        $commandName = get_class($command);
        if (class_exists($commandName)){
            $command = new $commandName;
        } else {
            throw new Exception($commandName . "command does not exist");
        }
        $write = $this->formatFactory->build('Json');
        $write->save();
    }

    //TODO understand how to handle the command
}