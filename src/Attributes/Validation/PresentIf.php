<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\Attributes\Validation;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Attributes\Validation\StringValidationAttribute;
use Spatie\LaravelData\Support\Validation\References\FieldReference;
use Spatie\LaravelData\Support\Validation\References\RouteParameterReference;
use Spatie\LaravelData\Support\Validation\RequiringRule;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER)]
final class PresentIf extends StringValidationAttribute implements RequiringRule
{
    private readonly FieldReference $fieldReference;

    private readonly string|array $values;

    public function __construct(
        string|FieldReference $field,
        array|string|\BackedEnum|RouteParameterReference ...$values,
    ) {
        $this->fieldReference = $this->parseFieldReference($field);
        $this->values = Arr::flatten($values);
    }

    #[\Override()]
    public static function keyword(): string
    {
        return 'present_if';
    }

    #[\Override()]
    public function parameters(): array
    {
        return [
            $this->fieldReference,
            $this->values,
        ];
    }
}
