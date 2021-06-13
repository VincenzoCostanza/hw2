<?php
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    //essa di default fa riferimento ad una tabella del database chiamata posts! e da di default primary ,autoincrement ecc
    protected $table="post";
    public $timestamps= false;

    public function likes(){
        return $this->belongsToMany('User','likes','post_id','user');
    }
    
    public function comments(){
        return $this->belongsToMany('User','commenti','post_id','user');
    }

    public function preferiti_post(){
        return $this->belongsToMany('User','preferiti_post','id_post','user');
    }
}

?>