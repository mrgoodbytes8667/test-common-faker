<?php


namespace Bytes\Tests\Common\Faker\Providers;


use Faker\Provider\Base;
use function Symfony\Component\String\u;

/**
 * Class SymfonyStringWords
 * @package Bytes\Tests\Common\Faker\Providers
 */
class SymfonyStringWords extends Base
{
    /**
     * @param int $nb
     * @return string
     */
    public function camelWords(int $nb = 3)
    {
        return u($this->generator->words($nb, true))->camel()->toString();
    }

    /**
     * @param int $nb
     * @return string
     */
    public function snakeWords(int $nb = 3)
    {
        return u($this->generator->words($nb, true))->snake()->toString();
    }
}