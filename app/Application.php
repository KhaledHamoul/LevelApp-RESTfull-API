<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model {

	protected $fillable = [
        'appID', 'userID'
    ];

	protected $table = 'applications';
	public $timestamps = false;

}