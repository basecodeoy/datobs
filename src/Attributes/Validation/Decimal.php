<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\Attributes\Validation;

use Spatie\LaravelData\Attributes\Validation\StringValidationAttribute;
use Spatie\LaravelData\Support\Validation\References\RouteParameterReference;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER)]
final class Decimal extends StringValidationAttribute
{
    public function __construct(
        private readonly int|float|RouteParameterReference $min,
        private readonly null|int|float|RouteParameterReference $max = null,
    ) {}

    #[\Override()]
    public static function keyword(): string
    {
        return 'decimal';
    }

    #[\Override()]
    public function parameters(): array
    {
        return \array_filter([$this->min, $this->max]);
    }
}
