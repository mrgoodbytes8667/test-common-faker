<?php

namespace Bytes\Common\Faker;

use Faker\Provider\Base;

/**
 * @property Base[]|array $providers
 */
trait TestFakerTrait
{
    /**
     * @var Generator
     */
    protected $faker;

    /**
     * @before
     */
    protected function setupFaker(): void
    {
        if (is_null($this->faker)) {
            $faker = Factory::create();
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
