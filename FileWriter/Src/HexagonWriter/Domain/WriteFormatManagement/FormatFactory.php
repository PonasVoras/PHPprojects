<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use FileWriter\Utils\Validator;
use Utils\Config;

/**
 * Class FormatFactory
 *
 * @package FileWriter\HexagonWriter\Domain\WriteFormatManagement
 */
class FormatFactory
{
    private $config;
    private $validator;
    const COMMAND_NAME_PREFIX = 'Write';

    public function __construct()
    {
        $this->config = new Config();
        $this->validator = new Validator();
    }

    /**
     * Builds a writer object, if such exists.
     *
     * @param string $format
     * @return mixed
     * @throws \Exception
     */
    public function build(string $format)
    {
        $classPrefix = $this->config->getWriteFormatClassPrefix();
        $className = $classPrefix
            .self::COMMAND_NAME_PREFIX
            .ucfirst($format);
        $this->validator->validateClassExists($className);
        return new $className;
    }
}