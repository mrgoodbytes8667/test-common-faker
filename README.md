# test-common-faker
[![Packagist Version](https://img.shields.io/packagist/v/mrgoodbytes8667/test-common-faker?logo=packagist&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mrgoodbytes8667/test-common-faker?logo=php&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
![Symfony Versions Supported](https://img.shields.io/endpoint?url=https%3A%2F%2Fshields.mrgoodbytes.dev%2Fshield%2Fsymfony%2F%255E5.2%2520%257C%2520%255E6.0%2520%257C%2520%255E7.0&logoColor=FFF&style=flat)
![Symfony LTS Version](https://img.shields.io/endpoint?url=https%3A%2F%2Fshields.mrgoodbytes.dev%2Fshield%2Flts%2F%255E5.2%2520%257C%2520%255E6.0%2520%257C%2520%255E7.0&logoColor=FFF&style=flat)
![Symfony Stable Version](https://img.shields.io/endpoint?url=https%3A%2F%2Fshields.mrgoodbytes.dev%2Fshield%2Fstable%2F%255E5.2%2520%257C%2520%255E6.0%2520%257C%2520%255E7.0&logoColor=FFF&style=flat)
![Symfony Dev Version](https://img.shields.io/endpoint?url=https%3A%2F%2Fshields.mrgoodbytes.dev%2Fshield%2Fdev%2F%255E5.2%2520%257C%2520%255E6.0%2520%257C%2520%255E7.0&logoColor=FFF&style=flat)
![Packagist License](https://img.shields.io/packagist/l/mrgoodbytes8667/test-common-faker?logo=creative-commons&logoColor=FFF&style=flat)
![GitHub Release Workflow Status](https://img.shields.io/github/actions/workflow/status/mrgoodbytes8667/test-common-faker/release.yml?label=stable%20build&logo=github&logoColor=FFF&style=flat)  
Provides a [Faker](https://fakerphp.github.io/) test helper

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Open a command console, enter your project directory and execute:

```console
$ composer require mrgoodbytes8667/test-common-faker
```

## Usage

```php
class SampleTest extends KernelTestCase
{
    use \Bytes\Common\Faker\TestFakerTrait;

    public function testSomething()
    {
        $number = $this->faker->numberBetween();
        self::assertLessThan(0, $number);
    }
}
```
Note: @var is helpful for IDE autocompletion

### With PHPUnit
If you are using `$faker` in every test, you can use `TestFakerTrait` to setup/teardown `$this->faker` before/after each test.
Declare `$this->providers` as an array of additional providers beyond `MiscProvider` to auto-add them when using this trait.

## License
[![License](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)]("http://creativecommons.org/licenses/by-nc/4.0/)  
Test Common Faker by [MrGoodBytes](https://mrgoodbytes.dev) is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](http://creativecommons.org/licenses/by-nc/4.0/).  
Based on a work at [https://github.com/mrgoodbytes8667/test-common-faker](https://github.com/mrgoodbytes8667/test-common-faker).