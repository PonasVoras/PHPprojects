<?php
namespace Utils;

class Config
{
    const CONFIG_FILE = __DIR__ . "\..\config.json";

    private function parseConfig(string $requiredParam)
    {
        if (file_exists(self::CONFIG_FILE)){
            $configFile = file_get_contents(self::CONFIG_FILE);
            $configValue = json_decode($configFile, true);
            //var_dump($configValue);
            $configValue = $configValue[$requiredParam];
            return $configValue;
        } else {
            throw new \Exception('File does not exist');
        }
    }

    public function getInputFileBaseDir(): string
    {
        return $this->parseConfig("input_file_base_dir");
    }

    public function getOutputFileBaseDir(): string
    {
        return $this->parseConfig("output_file_base_dir");
    }

    public function getWriteFormat(): string
    {
        return $this->parseConfig("write_format");
    }

}