<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'salary',
    //     'company',
    //     'location',
    //     'email',
    //     'tags',
    // ];

    public function scopeFilter($query, array $filters)
    {
        //dd($filters);
        if (isset($filters['tag'])) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if (isset($filters['keywords'])) {
            $query->where('title', 'like', '%' . request('keywords') . '%')
                ->orWhere('description', 'like', '%' . request('keywords') . '%')
                ->orWhere('tags', 'like', '%' . request('keywords') . '%');
        }

        if (isset($filters['location'])) {
            $query->where('location', 'like', '%' . request('location') . '%');
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
