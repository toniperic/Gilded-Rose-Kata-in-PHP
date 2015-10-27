<?php

namespace App\Item;

use App\Item;

class BackstagePassesToATAFKAL80ETCConcert extends Item
{
    const QUALITY_TICK_STEP = 1;

    public function tick()
    {
        $this->processQuality();

        if ($this->daysLeftToSell(10)) {
            $this->processQuality();
        }

        if ($this->daysLeftToSell(5)) {
            $this->processQuality();
        }

        if ($this->sellDateReached()) {
            $this->quality = static::MIN_QUALITY;
        }

        $this->decrementSellDate();
    }

    private function daysLeftToSell($num)
    {
        return $this->sellIn <= $num;
    }
}
