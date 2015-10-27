<?php

namespace App\Item;

use App\Item;

class Normal extends Item
{

    public function tick()
    {
        $this->processQuality();
        $this->decrementSellDate();

        if ($this->atMinimumQuality()) {
            return;
        }

        if ($this->sellDateReached()) {
            $this->processQuality();
        }
    }

}
