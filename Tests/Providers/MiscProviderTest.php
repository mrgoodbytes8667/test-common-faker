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
     *
     */
    public function testRangeBetween()
    {
        /** @var FakerGenerator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        $range = $faker->rangeBetween(4, 1, 2);

        $count = count($range);
        $this->assertGreaterThanOrEqual(2, $count);
        $this->assertLessThanOrEqual(4, $count);

        foreach ($range as $i) {
            $this->assertGreaterThanOrEqual(1, $i);
            $this->assertLessThanOrEqual(4, $i);
        }
    }

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

    /**
     *
     */
    public function testParagraphsMinimumChars()
    {
        /** @var FakerGenerator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        $minChars = $faker->numberBetween(1000, 1500);

        $this->assertGreaterThanOrEqual($minChars, strlen($faker->paragraphsMinimumChars($minChars)));
    }

    /**
     * @dataProvider provideParagraphsMinimumChars
     * @param $minChars
     */
    public function testParagraphsMinimumCharsMultiple($minChars, $value)
    {
        $this->assertGreaterThanOrEqual($minChars, strlen($value));
    }

    /**
     * @return Generator
     */
    public function provideParagraphsMinimumChars()
    {
        /** @var FakerGenerator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        foreach (range(1, 250) as $index) {
            foreach (range(1, 1500, 100) as $minChars) {
                yield ['minChars' => $minChars, 'value' => $faker->paragraphsMinimumChars($minChars)];
            }
        }
    }
}