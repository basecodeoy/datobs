<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Datobs\Attributes\Validation;

use Spatie\LaravelData\Attributes\Validation\StringValidationAttribute;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER)]
final class Ascii extends StringValidationAttribute
{
    #[\Override()]
    public static function keyword(): string
    {
        return 'ascii';
    }

    #[\Override()]
    public function parameters(): array
    {
        return [];
    }
}
