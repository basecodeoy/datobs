<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\Casts;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\Uncastable;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

final readonly class CarbonImmutableCast implements Cast
{
    public function __construct(
        private ?string $timeZone = null,
    ) {}

    #[\Override()]
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): \DateTimeInterface|Uncastable
    {
        if (\is_string($this->timeZone)) {
            return CarbonImmutable::parse((string) $value, $this->timeZone);
        }

        return CarbonImmutable::parse((string) $value);
    }
}
