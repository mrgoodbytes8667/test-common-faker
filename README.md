# test-common-faker
[![Packagist Version](https://img.shields.io/packagist/v/mrgoodbytes8667/test-common-faker?logo=packagist&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mrgoodbytes8667/test-common-faker?logo=php&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
![Packagist License](https://img.shields.io/packagist/l/mrgoodbytes8667/test-common-faker?logo=creative-commons&logoColor=FFF&style=flat)
![GitHub Release Workflow Status](https://img.shields.io/github/actions/workflow/status/mrgoodbytes8667/test-common-faker/release.yml?label=stable%20build&logo=github&logoColor=FFF&style=flat)
![GitHub Tests Workflow Status](https://img.shields.io/github/actions/workflow/status/mrgoodbytes8667/test-common-faker/run-tests.yml?logo=github&logoColor=FFF&style=flat)
![GitHub Coverage Workflow Status](https://img.shields.io/github/actions/workflow/status/mrgoodbytes8667/test-common-faker/code-coverage.yml?label=coverage%20build&logo=github&logoColor=FFF&style=flat)
[![codecov](https://img.shields.io/codecov/c/github/mrgoodbytes8667/test-common-faker/0.7?logo=codecov&logoColor=FFF&style=flat)](https://codecov.io/gh/mrgoodbytes8667/test-common-faker)  
Provides a [Faker](https://fakerphp.github.io/) test helper

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Open a command console, enter your project directory and execute:

```console
$ composer require mrgoodbytes8667/test-common-faker --dev
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

## Upgrade Notes
### From <0.7\* to 0.7.\*
- PHPUnit 9.\* support dropped due to annotations to attributes swap. There may be issues with 0.7.\*+ if used in conjunction with PHPUnit 9.\*
  Note: [Rector can automatically change tests to use the newer annotations](https://getrector.com/blog/how-to-upgrade-to-phpunit-10-in-diffs#:~:text=the%20%40annotations%20are%20flipped%20to%20%23%5Battributes%5D)

## License
[![License](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)]("http://creativecommons.org/licenses/by-nc/4.0/)  
Test Common Faker by [MrGoodBytes](https://mrgoodbytes.dev) is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](http://creativecommons.org/licenses/by-nc/4.0/).  
Based on a work at [https://github.com/mrgoodbytes8667/test-common-faker](https://github.com/mrgoodbytes8667/test-common-faker).