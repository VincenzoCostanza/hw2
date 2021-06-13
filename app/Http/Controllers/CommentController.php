<?php

use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController{
    public function VedereCommentiPrecedenti($post_id){
        $commenti=comment::where('post_id',$post_id)->get();
        foreach($commenti as $commento){
            $utente=User::where('id',$commento->user)->first();
            $commento["username"]=$utente->username;
            $result[]=$commento;
        }
        return $result;
}

    public function sostituisciConUsername($user_id){
        $utenti=User::where('id',$user_id)->first();
        return $utenti;
    }

    public function InserisciCommento($commento,$post_id){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                $new_commento=new comment;
                if($commento!=null){
                    $new_commento->user=$user->id;
                    $new_commento->post_id=$post_id;
                    $new_commento->commento=$commento;
                    $new_commento->save();
                    $post=Post::where('id',$post_id)->first();
                    if(isset($post)){
                        $commenti=$commenti=comment::where('post_id',$post_id)->get();
                        foreach($commenti as $commento){
                            $commento["username"]=$user->username;
                            $result[]=$commento;
                        }
                        return $result;
                    }
                }
            }
        }else{
            exit;
        }
    }

    public function num_commenti($post_id){
        $post=Post::where('id',$post_id)->first();
        if(isset($post)){
            return $post->num_commenti;
        }
    }
}

?>