<?php
namespace FileWriter\HexagonWriter\Application\CommandHandler;

use Exception;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\HexagonWriter\Domain\WriteFormatManagement\FormatFactory;
use Utils\Config;

class WriteCommandHandler implements CommandHandlerInterface
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
        $commandName = get_class($command);
        if (class_exists($commandName)){
            $command = new $commandName;
        } else {
            throw new Exception($commandName . "command does not exist");
        }

        $dataToWrite = $command->data();
        $format = $this->config->getWriteFormat();
        $writeFormat = $this->formatFactory->build($format);
        $writeFormat->save($dataToWrite);
    }

    //TODO understand how to handle the command
}