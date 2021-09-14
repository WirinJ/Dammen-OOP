<?php

namespace Dammen;

abstract class AbstractSteen
{
    public $kleur;

    public function __construct($kleur)
    {
        $this->kleur = $kleur;
    }
}
