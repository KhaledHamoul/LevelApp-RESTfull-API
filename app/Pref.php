<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model {

	protected $fillable = [
        'pref', 'userID', 'suggest'
    ];

	protected $table = 'prefs';
	public $timestamps = false;

}