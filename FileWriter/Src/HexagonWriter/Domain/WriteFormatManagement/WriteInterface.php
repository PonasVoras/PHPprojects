<?php
namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

interface WriteInterface
{
    public function save(string $data);
}