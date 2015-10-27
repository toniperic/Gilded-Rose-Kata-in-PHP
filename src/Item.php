<?php

namespace App;


class Item implements Tickable
{

    public $sellIn;
    public $quality;

    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;
    const QUALITY_TICK_STEP = -1;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
    }

    protected function decrementSellDate()
    {
        $this->sellIn--;
    }

    protected function atMinimumQuality()
    {
        return $this->quality === static::MIN_QUALITY;
    }

    protected function processQuality()
    {
        if ($this->quality > static::MIN_QUALITY && $this->quality < static::MAX_QUALITY) {
            $this->quality += static::QUALITY_TICK_STEP;
        }
    }

    protected function sellDateReached()
    {
        return $this->sellIn <= 0;
    }
}
