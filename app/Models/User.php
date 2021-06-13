<?php
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    //essa di default fa riferimento ad una tabella del database chiamata users! e da di default primary ,autoincrement ecc
    protected $table="utenti";
    protected $hidden=['password']; //serve appunto per poter nascondere la passord dell'utente.MECCANISMO DI SICUREZZA
    public $timestamps= false;

    public function likes(){
        return $this->belongsToMany('Post','likes','user','post_id');
    }

    public function comments(){
        return $this->belongsToMany('Post','commenti','user','post_id');
    }

    public function preferiti_competizione(){
        return $this->belongsToMany('Competizioni','preferiti_competizione','user','id_competizione');
    }

    public function preferiti_post(){
        return $this->belongsToMany('Post','preferiti_post','user','id_post');
    }
}
?>