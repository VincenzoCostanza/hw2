<?php

use Illuminate\Routing\Controller as BaseController;

class LikeController extends BaseController{
    public function like($post_id){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                $like=new like;
                $like->user=$user->id;
                $like->post_id=$post_id;
                $like->save();
                $post=Post::where('id',$post_id)->first();
                if(isset($post)){
                    return $post->num_like;
                }
            }    
        }else{
            exit;
        }
    }

    public function unlike($post_id){
        if(session('utente')!=null){
            $user=User::where('username',session('utente'))->first();
            if(isset($user)){
                $like=like::where('user',$user->id)->where('post_id',$post_id)->first();
                $like->delete();
                $post=Post::where('id',$post_id)->first();
                if(isset($post)){
                    return $post->num_like;
                }                            
            }
        }
    }

    public function GuardaLike($post_id){
        $post=Post::where('id',$post_id)->first();
        return $post->likes;
    }
}

?>