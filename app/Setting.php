<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model {

	protected $fillable = [
        'begin', 'end' , 'userID'
    ];

	protected $table = 'settings';
	public $timestamps = false;

}