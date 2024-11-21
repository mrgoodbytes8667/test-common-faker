<?php

namespace Bytes\Common\Faker\Tests\Fixtures;

use Bytes\Common\Faker\Providers\MiscProvider;
use Bytes\Common\Faker\Providers\SetupDependenciesTrait;
use Faker\Generator;
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
 * @property Generator|MiscProvider|Address|Barcode|Biased|Color|Company|DateTime|File|HtmlLorem|Image|Internet|Lorem|Medical|Miscellaneous|Payment|Person|PhoneNumber|Text|UserAgent|Uuid $generator
 */
class SampleProvider extends Base
{
    use SetupDependenciesTrait;

    public function __construct(Generator $generator)
    {
        self::addProviderIfNeeded(MiscProvider::class, $generator);
        parent::__construct($generator);
    }

    /**
     * @return true
     */
    public function alwaysReturnTrue()
    {
        return true;
    }
}
