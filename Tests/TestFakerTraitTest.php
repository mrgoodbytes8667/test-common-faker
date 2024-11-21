<?php

namespace Bytes\Common\Faker\Tests;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\Common\Faker\Tests\Fixtures\SampleProvider;
use PHPUnit\Framework\TestCase;

class TestFakerTraitTest extends TestCase
{
    use TestFakerTrait;

    protected $providers = [SampleProvider::class];

    public function testProviders()
    {
        self::assertNotNull($this->faker);

        self::assertIsString($this->faker->camelWords());

        self::assertTrue($this->faker->alwaysReturnTrue());
    }
}
