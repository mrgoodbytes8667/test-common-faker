<?php


namespace Bytes\Common\Faker\Providers;


use Faker\Provider\Base;
use function Symfony\Component\String\u;

/**
 * Class MiscProvider
 * @package Bytes\Common\Faker\Providers
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
        if ($count === 0 || $count > count($source)) {
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
        return range($start, $this->generator->numberBetween($start, $end));
    }

    /**
     * Returns a random string (default alphanumeric) of $length characters
     * @param int $length = 16
     * @param null $possibilities = self::getAlphanumerics()
     * @return string
     */
    public function randomAlphanumericString(int $length = 16, $possibilities = null)
    {
        if (empty($possibilities)) {
            $possibilities = self::getAlphanumerics();
        }
        if (is_string($possibilities)) {
            $possibilities = str_split($possibilities);
        }
        if (!is_array($possibilities)) {
            $possibilities = self::getAlphanumerics();
        }

        $output = '';
        foreach (range(1, $length) as $i) {
            $output .= $this->generator->randomElement($possibilities);
        }
        return $output;
    }

    /**
     * @return string[]
     */
    public static function getAlphanumerics()
    {
        return str_split('0123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz');
    }
}