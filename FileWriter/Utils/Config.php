<?php

declare(strict_types=1);

namespace Utils;

use DateTime;
use FileWriter\Utils\Validator;

/**
 * Class Config
 *
 * @package Utils
 */
class Config
{
    const CONFIG_FILE = __DIR__ . "\..\config.json";
    const DEFAULT_USER_FILE_FORMAT = '.txt';
    const CONFIG_NAME = 'Config';
    private $validator;

    //Config parameter constants
    const CONFIGURATION_TIME = 'configuration_time';
    const FILENAME = 'fileName';
    const INPUT_FILE_DIR ="input_file_base_dir";
    const OUTPUT_FILE_DIR = "output_file_base_dir";
    const WRITE_FORMAT = "write_format";
    const WRITE_CONFIG_FORMAT = 'write_config_format';
    const WRITE_FORMAT_CLASS_PREFIX = "write_format_class_prefix";
    const HANDLER_CLASS_PREFIX =  "handler_class_prefix";
    const COMMAND_CLASS_PREFIX = "command_class_prefix";

    public function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * @param string $requiredParameter
     * @return mixed
     * @throws \Exception
     */
    private function parseConfig(string $requiredParameter)
    {
        $this->validator->validateFileExists(self::CONFIG_FILE);
        $configFile = file_get_contents(self::CONFIG_FILE);
        $configValue = json_decode($configFile, true);
        $configValue = $configValue[$requiredParameter];
        return $configValue;
    }

    /**
     * @param string $parameter
     * @param string $value
     */
    private function configure(
        string $parameter,
        string $value)
    {
        $configFile = file_get_contents(self::CONFIG_FILE);
        $configFile= json_decode($configFile, true);
        $configFile[$parameter] = $value;
        $configFile = json_encode($configFile);
        file_put_contents(self::CONFIG_FILE, $configFile);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getInputFileBaseDir(): string
    {
        return $this->parseConfig(self::INPUT_FILE_DIR);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getOutputFileBaseDir(): string
    {
        return $this->parseConfig(self::OUTPUT_FILE_DIR);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getWriteFormat(): string
    {
        return $this->parseConfig(self::WRITE_FORMAT);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getConfigWriteFormat(): string
    {
        return $this->parseConfig(self::WRITE_CONFIG_FORMAT);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getWriteFormatClassPrefix(): string
    {
        return $this->parseConfig(self::WRITE_FORMAT_CLASS_PREFIX);
    }
    /**
     * @return string
     * @throws \Exception
     */
    public function getHandlerClassPrefix(): string
    {
        return $this->parseConfig(self::HANDLER_CLASS_PREFIX);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getCommandClassPrefix(): string
    {
        return $this->parseConfig(self::COMMAND_CLASS_PREFIX);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getFileName(): string
    {
        return $this->parseConfig(self::FILENAME);
    }

    /**
     * @param string $fileName
     * @throws \Exception
     */
    public function setFileName(string $fileName)
    {
        $this->configure(self::FILENAME, $fileName);
        $dateTime = new DateTime();
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        $this->configure(self::CONFIGURATION_TIME, $dateTime);
    }
}