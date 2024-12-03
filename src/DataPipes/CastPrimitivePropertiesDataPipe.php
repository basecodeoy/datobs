<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\DataPipes;

use Spatie\LaravelData\DataPipes\DataPipe;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataClass;
use Spatie\LaravelData\Support\DataProperty;

final readonly class CastPrimitivePropertiesDataPipe implements DataPipe
{
    #[\Override()]
    public function handle(mixed $payload, DataClass $dataClass, array $properties, CreationContext $creationContext): array
    {
        foreach ($properties as $name => $value) {
            $dataProperty = $dataClass->properties->first(fn (DataProperty $dataProperty): bool => $dataProperty->name === $name);

            if ($dataProperty === null) {
                continue;
            }

            if ($value === null) {
                continue;
            }

            if ($value instanceof Optional) {
                continue;
            }

            if ($value instanceof Lazy) {
                continue;
            }

            $properties[$name] = match (true) {
                $dataProperty->type->acceptsType('array') => (array) $value,
                $dataProperty->type->acceptsType('bool') => (bool) $value,
                $dataProperty->type->acceptsType('float') => (float) $value,
                $dataProperty->type->acceptsType('int') => (int) $value,
                $dataProperty->type->acceptsType('string') => (string) $value,
                default => $value,
            };
        }

        return $properties;
    }
}
