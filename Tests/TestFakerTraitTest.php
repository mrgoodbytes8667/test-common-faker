<?php

namespace Bytes\Common\Faker\Tests;

use Bytes\Common\Faker\TestFakerTrait;
use PHPUnit\Framework\TestCase;

class TestFakerTraitTest extends TestCase
{
    use TestFakerTrait;

    public function testProviders()
    {
        self::assertNotNull($this->faker);

        self::assertIsString($this->faker->camelWords());
    }
}
