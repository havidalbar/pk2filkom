<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

	protected $primaryKey = 'slug';
	protected $keyType = 'string';
	public $incrementing = false;
}
