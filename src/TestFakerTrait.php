<?php

namespace Bytes\Common\Faker;

use Bytes\Common\Faker\Providers\Image;
use Bytes\Common\Faker\Providers\MiscProvider;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Base;

/**
 * Trait TestFakerTrait.
 *
 * @property Base[]|array $providers
 */
trait TestFakerTrait
{
    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * @before
     */
    protected function setupFaker(): void
    {
        if (is_null($this->faker)) {
            $faker = Factory::create();
            $faker->addProvider(new MiscProvider($faker));
            $faker->addProvider(new Image($faker));
            foreach ($this->getProviders() as $class) {
                $provider = new $class($faker);
                $faker->addProvider($provider);
            }

            $this->faker = $faker;
        }
    }

    /**
     * @return array|Base[]
     *
     * @var Base[]|array
     */
    protected function getProviders()
    {
        return $this->providers ?? [];
    }

    /**
     * @after
     */
    protected function tearDownFaker(): void
    {
        $this->faker = null;
    }
}
