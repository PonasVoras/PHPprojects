<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Application\CommandHandler;

use Exception;
use FileWriter\HexagonWriter\Domain\CommandHandlerInterface;
use FileWriter\HexagonWriter\Domain\CommandInterface;
use FileWriter\HexagonWriter\Domain\WriteFormatManagement\FormatFactory;

/**
 * Class WriteConfigCommandHandler
 *
 * @package FileWriter\HexagonWriter\Application\CommandHandler
 */
class WriteConfigCommandHandler implements CommandHandlerInterface
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
        $dataToWrite = $command->getPreparedData();
        $writeFormat = $this->formatFactory->build($dataToWrite['format']);
        $writeFormat->save($dataToWrite);
    }
}