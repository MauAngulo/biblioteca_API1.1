<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    //
	protected $table = 'noticias';

    protected $primary_key = 'id_noticia';

    public $timestamps = false;

    protected $fillable = [
    	'titulo',
    	'texto',
    	'fecha',
    ];

    public function user() {
        return $this->hasOne('App/User', 'id', 'noticia_id');
    }
}
