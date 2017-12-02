<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $table = 'files';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'upload_date',
    	'file_name',
    	'avaliability',
    ];

    public function userTypes() {
    	return $this->hasMany('App\UserTypes', 'access', 'id', 'id_files');
    }
}
