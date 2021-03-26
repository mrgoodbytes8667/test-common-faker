<?php


namespace Bytes\Tests\Common\Faker;


use Bytes\Tests\Common\Faker\Providers\Discord;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Miscellaneous;

/**
 * Trait TestDiscordFakerTrait
 * @package Bytes\Tests\Common\Faker
 *
 * @deprecated v0.0.5 Moved to the bundle mrgoodbytes8667/test-discord-faker.
 */
trait TestDiscordFakerTrait
{
    /**
     * @var Discord|FakerGenerator|Miscellaneous
     */
    protected $faker;

    /**
     * @before
     */
    protected function setupFaker(): void
    {
        trigger_deprecation('mrgoodbytes8667/test-common-faker', '0.0.5', 'The "%s()" class has moved to the bundle mrgoodbytes8667/test-discord-faker.', __CLASS__);
        if (is_null($this->faker)) {
            /** @var FakerGenerator|Discord $faker */
            $faker = Factory::create();
            $faker->addProvider(new Discord($faker));
            $this->faker = $faker;
        }
    }

    /**
     * @after
     */
    protected function tearDownFaker(): void
    {
        trigger_deprecation('mrgoodbytes8667/test-common-faker', '0.0.5', 'The "%s()" class has moved to the bundle mrgoodbytes8667/test-discord-faker.', __CLASS__);
        $this->faker = null;
    }
}