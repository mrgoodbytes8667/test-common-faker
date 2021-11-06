<?php


namespace Bytes\Common\Faker\Providers;


use Faker\Generator;

/**
 * Trait SetupDependenciesTrait
 * @package Bytes\Common\Faker\Providers
 * @codeCoverageIgnore
 */
trait SetupDependenciesTrait
{
    /**
     * @param string $provider
     * @param Generator $generator
     */
    public function addProviderIfNeeded(string $provider, Generator $generator)
    {
        if (is_null($this->first($generator->getProviders(), function ($value, $key) use ($provider) {
            return get_class($value) === $provider;
        }))) {
            $generator->addProvider(new $provider($generator));
        }
    }

    /**
     * Adapted from illuminate/collections
     * @param $array
     * @param callable $callback
     * @return mixed|null
     */
    public function first($array, callable $callback)
    {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return null;
    }
}
