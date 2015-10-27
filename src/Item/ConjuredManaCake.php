<?php

namespace App\Item;

use App\Item;

class ConjuredManaCake extends Item
{

    const QUALITY_TICK_STEP = -2;

    public function tick()
    {
        $this->processQuality();

        $this->decrementSellDate();

        if ($this->sellDateReached()) {
            $this->processQuality();
        }
    }
}
