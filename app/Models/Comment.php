<?php
use Illuminate\Database\Eloquent\Model;

class comment extends Model{
    //essa di default fa riferimento ad una tabella del database chiamata likese mi sta bene!
    protected $table="commenti";
    public $timestamps= false;

    
}

?>