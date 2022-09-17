<?php

declare(strict_types=1);

namespace App\Models\Traits;

use DateTimeInterface;

trait ExportsDatetimeValues
{
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
