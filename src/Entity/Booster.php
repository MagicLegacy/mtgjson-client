<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Entity;

use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializableTrait;

/**
 * Class Booster
 *
 * @author Romain Cottard
 */
final class Booster implements \JsonSerializable
{
    use MtgJsonSerializableTrait;

    private \stdClass $rawData;

    public function __construct(\stdClass $rawData)
    {
        $this->rawData = $rawData;
    }

    public function getRawData(): \stdClass
    {
        return $this->rawData;
    }
}
