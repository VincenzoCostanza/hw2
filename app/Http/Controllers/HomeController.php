<?php

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController{
    public function home(){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                return view('home')->with('username',$user->username);
            }
        }else{
            return view('home');
        }
    }

    public function preferiti(){
        return view('preferiti');
    }

    public function info(){
        return view('info');
    }

    public function competizioni(){
        return view('competizioni');
    }

    public function partite_quot(){
        return view('partite_quot');
    }

    public function articoli(){
        $post=Post::get();
        return $post;
   }

    public function inserisciInPreferiti($nome,$img){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            $competizione=Competizioni::where('titolo',$nome)->where('immagine',$img)->first();
            if(isset($competizione)){
                if(isset($user)){
                    $preferito=new Preferiti_compe;
                    $preferito->user=$user->id;
                    $preferito->id_competizione=$competizione->id;
                    $preferito->titolo=$nome;
                    $preferito->immagine=$img;
                    $preferito->save();
                }
            }else{
                $articolo=Post::where('titolo',$nome)->where('immagine',$img)->first();
                if(isset($user)){
                    $preferito=new Preferiti_post;
                    $preferito->user=$user->id;
                    $preferito->id_post=$articolo->id;
                    $preferito->titolo=$nome;
                    $preferito->immagine=$img;
                    $preferito->save();
                }    
            }    
        }else{
            exit;
        }
    }

    public function rimuoviDaiPreferiti($titolo,$img){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            $preferito_competizione=Preferiti_compe::where('titolo',$titolo)->where('immagine',$img)->where('user',$user->id)->first();
            if(isset($preferito_competizione)){
                if(isset($user)){
                    $preferito_competizione->delete();
                    $preferiti_compe=Preferiti_compe::where('user',$user->id)->get();
                    if(count($preferiti_compe)>0){
                        foreach($preferiti_compe as $preferito){
                            $result[]=$preferito;
                        }
                        $preferiti_post=Preferiti_post::where('user',$user->id)->get();
                        if(count($preferiti_post)>0){
                            foreach($preferiti_post as $preferito_post){
                                $result[]=$preferito_post;
                            }   
                        }
                        return $result;
                    }else{
                        $preferiti_post=Preferiti_post::where('user',$user->id)->get();
                        if(count($preferiti_post)>0){
                            foreach($preferiti_post as $preferito_post){
                                $result[]=$preferito_post;
                            }
                        }else{
                            return 0;
                        }
                        return $result;    
                    }
                }
            }else{
                $preferito_post=Preferiti_post::where('titolo',$titolo)->where('immagine',$img)->where('user',$user->id)->first();
                if(isset($user)){
                    $preferito_post->delete();
                    $preferiti_post=Preferiti_post::where('user',$user->id)->get();
                    if(count($preferiti_post)>0){
                        foreach($preferiti_post as $preferito_post){
                            $result[]=$preferito_post;
                        }
                        $preferiti_compe=Preferiti_compe::where('user',$user->id)->get();
                        if(count($preferiti_compe)>0){
                            foreach($preferiti_compe as $preferito_co){
                                $result[]=$preferito_co;
                            }
                        }
                        return $result;
                    }else{
                        $preferiti_compe=Preferiti_compe::where('user',$user->id)->get();
                        if(count($preferiti_compe)>0){
                            foreach($preferiti_compe as $preferito_comp){
                                $result[]=$preferito_comp;
                            }
                        }else{
                            return 0;
                        }
                        return $result;
                    }
                }    
            }
        }else{
            exit;
        }
   }
}

?>    