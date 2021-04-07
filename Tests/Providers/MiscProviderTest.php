<?php

namespace Bytes\Common\Faker\Tests\Providers;

use Bytes\Common\Faker\Providers\MiscProvider;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class MiscProviderTest
 * @package Bytes\Common\Faker\Tests\Providers
 */
class MiscProviderTest extends TestCase
{
    /**
     * @dataProvider provideRangeBetween412
     * @param $range
     */
    public function testRangeBetween412($range)
    {
        $count = count($range);
        $this->assertGreaterThanOrEqual(2, $count);
        $this->assertLessThanOrEqual(4, $count);

        foreach ($range as $i) {
            $this->assertGreaterThanOrEqual(1, $i);
            $this->assertLessThanOrEqual(4, $i);
        }
    }

    /**
     * @return Generator
     */
    public function provideRangeBetween412()
    {
        /** @var FakerGenerator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        foreach (range(1, 1000) as $index) {
            yield [$faker->rangeBetween(4, 1, 2)];
        }
    }

    /**
     * @dataProvider provideRangeBetween915
     * @param $range
     */
    public function testRangeBetween915($range)
    {
        $count = count($range);
        $this->assertGreaterThanOrEqual(5, $count);
        $this->assertLessThanOrEqual(9, $count);

        foreach ($range as $i) {
            $this->assertGreaterThanOrEqual(1, $i);
            $this->assertLessThanOrEqual(9, $i);
        }
    }

    /**
     * @return Generator
     */
    public function provideRangeBetween915()
    {
        /** @var FakerGenerator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        foreach (range(1, 1000) as $index) {
            yield [$faker->rangeBetween(9, 1, 5)];
        }
    }
}