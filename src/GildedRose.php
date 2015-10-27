<?php

namespace App;

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        $class = static::resolveClass($name);

        return new $class($quality, $sellIn);
    }

    private static function resolveClass($name)
    {
        $class = sprintf('App\Item\%s', preg_replace('/\s+/', '', ucwords($name)));

        if (class_exists($class)) {
            return $class;
        }

        return Item::class;
    }
}
