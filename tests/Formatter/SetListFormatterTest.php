<?php

/*
 * Copyright (c) Deezer
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Tests\Formatter;

use MagicLegacy\Component\MtgJson\Entity\SetBasic;
use MagicLegacy\Component\MtgJson\Formatter\SetListFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Class SetListFormatterTest
 */
class SetListFormatterTest extends TestCase
{
    /**
     * @return void
     * @throws \JsonException
     */
    public function testICanGetValuesFromValueObjectAfterFormatting(): void
    {
        $result   = $this->getResponseObject();
        $entities = (new SetListFormatter())->format($result);


        $data   = reset($result->data);
        /** @var SetBasic $entity */
        $entity = reset($entities);

        $this->assertEquals($data->baseSetSize, $entity->getBaseSetSize());
        $this->assertEquals($data->totalSetSize, $entity->getTotalSetSize());
        $this->assertEquals($data->code, $entity->getCode());
        $this->assertEquals($data->name, $entity->getName());
        $this->assertEquals($data->releaseDate, $entity->getReleaseDate());
        $this->assertEquals($data->type, $entity->getType());
        $this->assertFalse($entity->isFoilOnly());
        $this->assertFalse($entity->isPaperOnly());
        $this->assertFalse($entity->isOnlineOnly());
    }

    /**
     * @return \stdClass
     * @throws \JsonException
     */
    private function getResponseObject(): \stdClass
    {
        return json_decode(
            '{"data": [{"baseSetSize": 2, "code": "P15A", "name": "15th Anniversary Cards", "releaseDate": "2008-04-01", "totalSetSize": 2, "type": "promo"}]}',
            false,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
