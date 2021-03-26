<?php


namespace Bytes\Tests\Common\Faker\Providers;


use Faker\Generator;
use Faker\Provider\Base;
use Faker\Provider\Internet;

/**
 * Class Discord
 * @package Bytes\Tests\Common\Faker\Providers
 *
 * @property Generator|Internet $generator
 */
class Discord extends Base
{
    /**
     *
     */
    const REGIONS = [
        'brazil',
        'europe',
        'hong-kong',
        'india',
        'japan',
        'russia',
        'singapore',
        'south-africa',
        'sydney',
        'us-central',
        'us-east',
        'us-south',
        'us-west',
    ];

    /**
     * @param bool $isGif
     * @return string
     */
    public function iconHash(bool $isGif = false)
    {
        $output = '';
        foreach (range(1, 6) as $index) {
            $output .= str_pad(dechex(self::numberBetween(1, 16777215)), 6, '0', STR_PAD_LEFT);
        }
        return ($isGif ? 'a_' : '') . substr($output, 0, 32);
    }

    /**
     * @return string
     */
    public function guildId()
    {
        return self::snowflake(7);
    }

    /**
     * @param int|null $prepend
     * @return string
     */
    public function snowflake(?int $prepend = null)
    {
        $output = '';
        if (!is_null($prepend)) {
            $output = (string)$prepend;
        }
        foreach (range(1, 3) as $index) {
            $output .= (string)$this->generator->numberBetween(100000, 999999);
        }
        return substr($output, 0, 18);
    }

    /**
     * @return string
     */
    public function roleId()
    {
        return self::snowflake(8);
    }

    /**
     * @return string
     */
    public function userId()
    {
        return self::snowflake(2);
    }

    /**
     * @return string
     */
    public function channelId()
    {
        return self::snowflake(2);
    }

    /**
     * @return string
     */
    public function messageId()
    {
        return self::snowflake(8);
    }

    /**
     * @return string
     */
    public function guildName()
    {
        return $this->generator->text(100);
    }

    /**
     * @return bool
     */
    public function owner()
    {
        return $this->generator->boolean();
    }

    /**
     * @param int $maxFeatures
     * @return string[]
     */
    public function features(int $maxFeatures = 3)
    {
        return $this->generator->words($maxFeatures);
    }

    /**
     * [username]#[discriminator]
     * @return string
     */
    public function userNameDiscriminator()
    {
        return $this->generator->userName() . '#' . self::discriminator();
    }

    /**
     * Zero-padded four digit number
     * @return string
     */
    public function discriminator()
    {
        return str_pad($this->generator->numberBetween(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * @return string
     */
    public function refreshToken()
    {
        return self::accessToken();
    }

    /**
     * @return string
     */
    public function accessToken()
    {
        $output = '';
        foreach (range(1, 30) as $i) {
            $output .= $this->generator->randomElement(self::getAlphanumerics());
        }
        return $output;
    }

    /**
     * @return string[]
     */
    public static function getAlphanumerics()
    {
        return str_split('123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz');
    }

    /**
     * @return string
     */
    public function tokenType()
    {
        return $this->generator->randomElement(['Bot', 'Bearer']);
    }

    /**
     * @return string
     */
    public function scope()
    {
        $temp = self::scopes(1);
        return array_shift($temp);
    }

    /**
     * @param int $max
     * @return string[]
     */
    public function scopes(int $max = 0)
    {
        $permissions = [
            'bot',
            'connections',
            'email',
            'identify',
            'guilds',
            'guilds.join',
            'gdm.join',
            'messages.read',
            'rpc',
            'rpc.api',
            'rpc.notifications.read',
            'webhook.incoming',
            'applications.builds.upload',
            'applications.builds.read',
            'applications.store.update',
            'applications.entitlements',
            'relationships.read',
            'activities.read',
            'activities.write',
            'applications.commands',
            'applications.commands.update',
        ];
        if ($max < 1) {
            $max = $this->generator->numberBetween(1, count($permissions));
        }
        return $this->generator->randomElements($permissions, $max);
    }

    /**
     * @return int
     */
    public function permissionInteger()
    {
        $permissions = [
            0x00000001,
            0x00000002,
            0x00000004,
            0x00000008,
            0x00000010,
            0x00000020,
            0x00000040,
            0x00000080,
            0x00000100,
            0x00000200,
            0x00000400,
            0x00000800,
            0x00001000,
            0x00002000,
            0x00004000,
            0x00008000,
            0x00010000,
            0x00020000,
            0x00040000,
            0x00080000,
            0x00100000,
            0x00200000,
            0x00400000,
            0x00800000,
            0x01000000,
            0x02000000,
            0x04000000,
            0x08000000,
            0x10000000,
            0x20000000,
            0x40000000,
        ];

        $return = 0;
        foreach ($this->generator->randomElements($permissions, $this->generator->numberBetween(0, count($permissions))) as $i) {
            $v = $i;
            $return |= $v;
        }
        return $return;
    }

    /**
     * @return int
     */
    public function channelType()
    {
        return $this->generator->numberBetween(0, 6);
    }

    /**
     * @return string
     */
    public function region()
    {
        return $this->generator->randomElement(self::REGIONS);
    }

    /**
     * @return string|null
     */
    public function rtcRegion()
    {
        return $this->generator->optional(self::rtcRegionNullProbability())->region();
    }

    /**
     * @return float
     */
    public static function rtcRegionNullProbability()
    {
        return 1 - (1 / (count(self::REGIONS) + 1));
    }

    /**
     * @param bool $excludeV6
     */
    public function messageType(bool $excludeV8 = false)
    {
        $types = range(0, 12);
        $types[] = 14;
        $types[] = 15;
        if(!$excludeV8)
        {
            $types[] = 19;
            $types[] = 20;
        }
        return $this->generator->randomElement($types);
    }

    /**
     * @param int|float|null $weight Optional weight for optional method. If null, optional is omitted
     * @return string|null
     */
    public function timestamp($weight = null)
    {
        if(is_null($weight))
        {
            return $this->generator->dateTimeThisMonth()->format(DATE_ATOM);
        }
        $date = $this->generator->optional($weight)->dateTimeThisMonth();

        if(is_null($date))
        {
            return $date;
        }
        return $date->format(DATE_ATOM);
    }
}