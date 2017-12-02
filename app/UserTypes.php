<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    //
    protected $table = 'user_types';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'user_type',
    ];


    public function files() {
    	return $this->belongsToMany('App\Files', 'access', 'id', 'id_access');
    }

	public function user() {
	    return $this->belongsTo('App\User', 'id', 'user_type_id');
	}
}
