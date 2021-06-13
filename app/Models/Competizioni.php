<?php
use Illuminate\Database\Eloquent\Model;

class Competizioni extends Model{
    //essa di default fa riferimento ad una tabella del database chiamata likese mi sta bene!
    protected $table="competizioni";
    public $timestamps= false;
    
    public function preferiti_competizione(){
        return $this->belongsToMany('User','preferiti_competizione','id_competizione','user');
    } 
}

?>