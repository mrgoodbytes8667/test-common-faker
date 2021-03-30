<?php


namespace Bytes\Common\Faker\Providers;


use Faker\Generator;
use Illuminate\Support\Arr;

/**
 * Trait SetupDependenciesTrait
 * @package Bytes\Common\Faker\Providers
 */
trait SetupDependenciesTrait
{
    /**
     * @param string $provider
     * @param Generator $generator
     */
    public function addProviderIfNeeded(string $provider, Generator $generator)
    {
        if (is_null(Arr::first($generator->getProviders(), function ($value, $key) use ($provider) {
            return get_class($value) === $provider;
        }))) {
            $generator->addProvider(new $provider($generator));
        }
    }
}
