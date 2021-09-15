<?php

namespace Dammen;

class IsGeldigeSpeler implements RegelInterface
{
    public function check($speler)
    {
        if ($speler->id === 0 || $speler->id === 1) {
            return true;
        }
        return false;
    }
}
