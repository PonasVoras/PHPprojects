<?php
namespace FileWriter\HexagonWriter\Application\CommandHandler;

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
     * @throws \Exception
     */
    public function handle(CommandInterface $command)
    {
        $write = $this->formatFactory->build($command);
        $write->save();
    }

    //TODO understand how to handle the command
}