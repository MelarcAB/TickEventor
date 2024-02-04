<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'deleted_by'
    ];
}
