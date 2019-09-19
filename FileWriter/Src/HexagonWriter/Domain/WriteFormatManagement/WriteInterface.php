<?php

declare(strict_types=1);

namespace FileWriter\HexagonWriter\Domain\WriteFormatManagement;

/**
 * Interface WriteInterface
 *
 * @package FileWriter\HexagonWriter\Domain\WriteFormatManagement
 */
interface WriteInterface
{
    public function save(array $data);
}