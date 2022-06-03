<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasTranslations;

	use HasFactory;

	public $translatable = ['country'];

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters): Builder
	{
		return $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where(DB::raw('lower(country)'), 'like', '%' . strtolower($search) . '%'));
	}
}
