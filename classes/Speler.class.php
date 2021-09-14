<?php

namespace Dammen;

class Speler
{
    public $id;
    public $kleur;
    public $beweegRichting;

    public function __construct($id, $kleur, $beweegRichting)
    {
        $this->id = $id;
        $this->kleur = $kleur;
        $this->beweegRichting = $beweegRichting;
    }
}
