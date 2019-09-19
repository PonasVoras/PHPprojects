<?php

declare(strict_types=1);

namespace Utils;

/**
 * Class InteractiveCli
 *
 * @package Utils
 */
class InteractiveCli
{
    /**
     * @return string
     */
    public function requestData(): string
    {
        $data = trim(fgets(STDIN));
        return $data;
    }
}