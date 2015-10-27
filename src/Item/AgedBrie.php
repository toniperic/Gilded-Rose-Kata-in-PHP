<?php

namespace App\Item;

use App\Item;

class AgedBrie extends Item
{

    const QUALITY_TICK_STEP = 1;

    public function tick()
    {
        $this->processQuality();
        $this->decrementSellDate();

        if ($this->sellDateReached()) {
            $this->processQuality();
        }
    }
}
