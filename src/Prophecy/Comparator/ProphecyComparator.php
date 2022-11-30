<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Comparator;

use Prophecy\Prophecy\ProphecyInterface;
use SebastianBergmann\Comparator\ObjectComparator;

/**
 * @final
 */
class ProphecyComparator extends ObjectComparator
{
    public function accepts($expected, $actual): bool
    {
        return is_object($expected) && is_object($actual) && $actual instanceof ProphecyInterface;
    }

    /**
     * @phpstan-param list<array{object, object}> $processed
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array()): void
    {
        parent::assertEquals($expected, $actual->reveal(), $delta, $canonicalize, $ignoreCase, $processed);
    }
}
