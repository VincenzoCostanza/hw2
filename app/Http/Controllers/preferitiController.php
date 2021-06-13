<?php

use Illuminate\Routing\Controller as BaseController;

class preferitiController extends BaseController{
    public function prendiIpreferiticompetizioni(){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                return $user->preferiti_competizione;
            }    
        }else{
            exit;
        }
    }

    public function prendiIpreferitiPost(){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                return $user->preferiti_post;
            }    
        }else{
            exit;
        }
    }
}

?>    