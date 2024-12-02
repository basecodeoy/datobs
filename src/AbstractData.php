<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs;

use BaseCodeOy\Datobs\DataPipes\CastPrimitivePropertiesDataPipe;
use BaseCodeOy\Datobs\DataPipes\ReplaceEmptyStringsWithNullDataPipe;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataPipeline;

abstract class AbstractData extends Data
{
    public static function createFrom(mixed ...$payloads): static
    {
        return static::from($payloads);
    }

    #[\Override()]
    public static function pipeline(): DataPipeline
    {
        return parent::pipeline()
            ->firstThrough(CastPrimitivePropertiesDataPipe::class)
            ->firstThrough(ReplaceEmptyStringsWithNullDataPipe::class);
    }
}
