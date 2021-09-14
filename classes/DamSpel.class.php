<?php

namespace Dammen;

class DamSpel
{
    public $bord;
    public $spelerAanDeBeurt;
    public $regelControleur;
    public $userInterface;
    public $players;
    public $speler1;
    public $speler2;

    public function __construct()
    {
        $this->bord = new Bord();
        $this->regelControleur = new RegelControleur();
        $this->userInterface = new UserInterface();
        $this->players = [
            $this->speler1 = new Speler(0, 'wit', -1),
            $this->speler2 = new Speler(1, 'zwart', 1)
        ];
        $this->spelerAanDeBeurt = $this->speler1;
    }

    public function start()
    {
        $winnaar = false;
        do {
            $this->bord->printStatus();
            do {
                $zet = $this->userInterface->vraagSpelerOmZet($this->spelerAanDeBeurt);
                $isGeldig = $this->regelControleur->isGeldigeZet($zet, $this->bord, $this->spelerAanDeBeurt);
                $over = $this->regelControleur->over;

                if (!$isGeldig) {
                    echo "Dit is geen geldige zet! Probeer het opnieuw.." . PHP_EOL . PHP_EOL;
                }
            } while (!$isGeldig);
            $this->bord->voerZetUit($zet);
            if ($over != null) {
                $this->bord->eet($over);
            }
            if ($this->regelControleur->wordtDam($zet, $this->spelerAanDeBeurt)) {
                $this->bord->maakDam($zet, $this->spelerAanDeBeurt);
            }
            //print_r($this->bord->vakjes);
            $this->spelerAanDeBeurt = $this->userInterface->kiesSpeler($this->players, $this->spelerAanDeBeurt);
        } while (!$winnaar);
    }
}
