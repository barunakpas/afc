<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer', 'is_sort', 'active'];

    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
