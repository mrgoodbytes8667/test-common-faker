<?php

namespace Bytes\Common\Faker;

use Faker\Provider\Base;
use PHPUnit\Framework\Attributes\After;
use PHPUnit\Framework\Attributes\Before;

/**
 * @property Base[]|array $providers
 */
trait TestFakerTrait
{
    /**
     * @var Generator
     */
    protected $faker;

    #[Before]
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

    #[After]
    protected function tearDownFaker(): void
    {
        $this->faker = null;
    }
}
