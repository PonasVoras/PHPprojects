<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

use Utils\Config;

class FormatFactory
{
    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }

    public function build(string $format)
    {
        $classPrefix = $this->config
            ->getWriteFormatClassPrefix();
        $className = $classPrefix . 'Write'.ucfirst($format);
        if (class_exists($className)){
            return new $className;
        } else throw new \Exception('Save format not found');
    }
}