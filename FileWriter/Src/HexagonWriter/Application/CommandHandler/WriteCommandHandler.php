<?php
namespace FileWriter\HexagonWriter\Application\CommandHandler;

use Exception;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\HexagonWriter\Domain\WriteFormatManagement\FormatFactory;

class WriteCommandHandler implements CommandHandlerInterface
{
    private $formatFactory;

    public function __construct()
    {
        $this->formatFactory = new FormatFactory();
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     * @throws Exception
     */
    public function handle(CommandInterface $command)
    {
        $dataToWrite = $command->data();
        $writeFormat = $this->formatFactory
            ->build($dataToWrite['format']);
        $writeFormat->save($dataToWrite);
    }
}