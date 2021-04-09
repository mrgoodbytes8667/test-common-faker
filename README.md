# test-common-faker
[![Packagist Version](https://img.shields.io/packagist/v/mrgoodbytes8667/test-common-faker?logo=packagist&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mrgoodbytes8667/test-common-faker?logo=php&logoColor=FFF&style=flat)](https://packagist.org/packages/mrgoodbytes8667/test-common-faker)
![Packagist License](https://img.shields.io/packagist/l/mrgoodbytes8667/test-common-faker?logo=creative-commons&logoColor=FFF&style=flat)  
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/test-common-faker/release?label=stable&logo=github&logoColor=FFF&style=flat)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/test-common-faker/tests?logo=github&logoColor=FFF&style=flat)
[![codecov](https://img.shields.io/codecov/c/github/mrgoodbytes8667/test-common-faker?logo=codecov&logoColor=FFF&style=flat)](https://codecov.io/gh/mrgoodbytes8667/test-common-faker)  
A [Faker](https://fakerphp.github.io/) provider with some random miscellaneous helpers

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
use Bytes\Common\Faker\Providers\MiscProvider;
use Faker\Factory;

/** @var Factory|MiscProvider $faker */
$faker = Factory::create();
$faker->addProvider(new MiscProvider($faker));

$faker->camelWords();
$faker->snakeWords();
$faker->oneOrMoreOf(['some', 'iterable', 'object']);
$faker->rangeBetween(4, 1, 2);
$faker->randomAlphanumericString();
$faker->paragraphsMinimumChars();
```
Note: @var is helpful for IDE autocompletion

### With PHPUnit
If you are using $faker in every test, you can use `TestFakerTrait` to setup/teardown `$this->faker` before/after each test.
Declare $this->providers as an array of additional providers beyond MiscProvider to auto-add them when using this trait.

## License
[![License](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)]("http://creativecommons.org/licenses/by-nc/4.0/)  
discord-response-bundle by [MrGoodBytes](https://www.goodbytes.live) is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](http://creativecommons.org/licenses/by-nc/4.0/).  
Based on a work at [https://github.com/mrgoodbytes8667/discord-response-bundle](https://github.com/mrgoodbytes8667/discord-response-bundle).