<?php

namespace Dammen;

class UserInterface
{
    public function vraagSpelerOmZet($speler)
    {
        print_r("$speler->kleur is aan de beurt" . PHP_EOL);
        print_r("welke steen wil je verplaatsen?" . PHP_EOL);
        $vanPositieInput = readline();
        print_r("waar wil je hem naartoe verplaatsen?" . PHP_EOL);
        $naarPositieInput = readline();
        $vanPositie = new Positie(intval(substr($vanPositieInput, 0, 1)), intval(substr($vanPositieInput, -1, 1)));
        $naarPositie = new Positie(intval(substr($naarPositieInput, 0, 1)), intval(substr($naarPositieInput, -1, 1)));
        return new Zet($vanPositie, $naarPositie);
    }

    public function kiesSpeler($spelers, $speler)
    {
        $id = 1 - $speler->id;
        foreach ($spelers as $player) {
            if ($id == $player->id) {
                return $player;
            }
        }
    }
}
