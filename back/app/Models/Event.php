<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Events\EventCategory;

use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'user_id',
        'category_id',
        'place_id',
        'image',
        'price',
        'start_date',
        'end_date',
        'place',
        'capacity',
        'event_category_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    //event belongs to a category
    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //event has many users
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users')->withTimestamps();
    }
}
