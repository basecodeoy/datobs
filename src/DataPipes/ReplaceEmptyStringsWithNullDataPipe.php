<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\DataPipes;

use Spatie\LaravelData\DataPipes\DataPipe;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataClass;
use Spatie\LaravelData\Support\DataProperty;

final readonly class ReplaceEmptyStringsWithNullDataPipe implements DataPipe
{
    #[\Override()]
    public function handle(mixed $payload, DataClass $class, array $properties, CreationContext $creationContext): array
    {
        foreach ($properties as $name => $value) {
            $dataProperty = $class->properties->first(fn (DataProperty $dataProperty): bool => $dataProperty->name === $name);

            if ($dataProperty === null) {
                continue;
            }

            if (\is_string($value) && \trim($value) === '') {
                $properties[$name] = null;
            }
        }

        return $properties;
    }
}
