<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = [];

	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['search'] ?? false, fn ($query, $search) => $query
		->where('name', 'like', '%' . $search . '%'));
	}

	public function infos()
	{
		return $this->hasOne(Info::class);
	}
}
