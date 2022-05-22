<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasFactory;

//	protected $table = 'countries';

//	protected $fillable = ['code', 'name'];
	protected $guarded = [];

	public function infos()
	{
		return $this->hasOne(Info::class);
	}
}
