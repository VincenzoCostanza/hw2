<?php

use Illuminate\Routing\Controller as BaseController;

class competizioniController extends BaseController{
    public function inserisciCompetizioni(){
        $competizioni=Competizioni::get();
        return $competizioni;
    }
}
?>    