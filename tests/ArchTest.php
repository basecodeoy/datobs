<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

arch('globals')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();

// arch('BaseCodeOy\Datobs')
//     ->expect('BaseCodeOy\Datobs')
//     ->toUseStrictTypes()
//     ->toBeFinal()
//     ->ignoring(BaseCodeOy\Datobs\AbstractData::class);

// arch('BaseCodeOy\Datobs\Attributes\Validation')
//     ->expect('BaseCodeOy\Datobs\Attributes\Validation')
//     ->toUseStrictTypes()
//     ->toBeFinal()
//     ->toExtend(Spatie\LaravelData\Attributes\Validation\StringValidationAttribute::class);

// arch('BaseCodeOy\Datobs\Casts')
//     ->expect('BaseCodeOy\Datobs\Casts')
//     ->toUseStrictTypes()
//     ->toBeFinal()
//     ->toBeReadonly()
//     ->toHaveSuffix('Cast');

// arch('BaseCodeOy\Datobs\DataPipes')
//     ->expect('BaseCodeOy\Datobs\DataPipes')
//     ->toHaveSuffix('DataPipe');
