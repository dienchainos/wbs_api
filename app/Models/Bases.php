<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Bases extends Eloquent
{
	protected $connection = 'mongodb';
	protected $primaryKey = '_id';
}
