<?php
namespace Utils;

use FileWriter\Utils\Validator;

class Config
{
    const CONFIG_FILE = __DIR__ . "\..\config.json";
    private $validator;

    //Config parameter constants
    const INPUT_FILE ="input_file_base_dir";
    const OUTPUT_FILE = "output_file_base_dir";
    const WRITE_FORMAT = "write_format";
    const WRITE_FORMAT_CLASS_PREFIX = "write_format_class_prefix";

    public function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * @param string $requiredParam
     * @return mixed
     * @throws \Exception
     */
    private function parseConfig(string $requiredParam)
    {
        $this->validator->validateFileExists(self::CONFIG_FILE);
        $configFile = file_get_contents(self::CONFIG_FILE);
        $configValue = json_decode($configFile, true);
        $configValue = $configValue[$requiredParam];
        return $configValue;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getInputFileBaseDir(): string
    {
        return $this->parseConfig(self::INPUT_FILE);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getOutputFileBaseDir(): string
    {
        return $this->parseConfig(self::OUTPUT_FILE);
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
    public function getWriteFormatClassPrefix(): string
    {
        return $this->parseConfig(self::WRITE_FORMAT_CLASS_PREFIX);
    }

}