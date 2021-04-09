<?php


namespace Bytes\Common\Faker;


use Bytes\Common\Faker\Providers\MiscProvider;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Address;
use Faker\Provider\Barcode;
use Faker\Provider\Base;
use Faker\Provider\Biased;
use Faker\Provider\Color;
use Faker\Provider\Company;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Medical;
use Faker\Provider\Miscellaneous;
use Faker\Provider\Payment;
use Faker\Provider\Person;
use Faker\Provider\PhoneNumber;
use Faker\Provider\Text;
use Faker\Provider\UserAgent;
use Faker\Provider\Uuid;

/**
 * Trait TestFakerTrait
 * @package Bytes\Common\Faker
 *
 * @property Base[]|array $providers
 */
trait TestFakerTrait
{
    /**
     * @var FakerGenerator|MiscProvider|Address|Barcode|Biased|Color|Company|DateTime|File|HtmlLorem|Image|Internet|Lorem|Medical|Miscellaneous|Payment|Person|PhoneNumber|Text|UserAgent|Uuid
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
            foreach ($this->getProviders() as $class) {
                $provider = new $class($faker);
                $faker->addProvider($provider);
            }
            $this->faker = $faker;
        }
    }

    /**
     * @return array|Base[]
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