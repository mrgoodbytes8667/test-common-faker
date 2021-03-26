<?php


namespace Bytes\Tests\Common\Faker\Providers;


use Faker\Provider\Base;
use function Symfony\Component\String\u;

/**
 * Class MiscProvider
 * @package Bytes\Tests\Common\Faker\Providers
 */
class MiscProvider extends Base
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

    /**
     * Returns randomly ordered subsequence of 1 to $count elements from a provided array
     *
     * @param array $source Array to take elements from
     * @param int $count Maximum number of elements to take. Defaults to the number of elements in $source
     * @param false $allowDuplicates Allow elements to be picked several times. Defaults to false
     * @return array
     */
    public function oneOrMoreOf($source, int $count = 0, $allowDuplicates = false)
    {
        if($count === 0 || $count > count($source))
        {
            $count = count($source);
        }
        return $this->generator->randomElements($source, $this->generator->numberBetween(1, $count), $allowDuplicates);
    }

    /**
     * Returns a range() array using range($start, $end)
     *
     * @param int $end
     * @param int $start
     * @return array
     */
    public function rangeBetween(int $end = 3, int $start = 1)
    {
        return range($start, $this->generator->numberBetween(1, $end));
    }
}