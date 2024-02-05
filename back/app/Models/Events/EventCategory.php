<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Event;
use App\Models\User;

class EventCategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'slug',
        
    ];



    public function events()
    {
        return $this->hasMany(Event::class);
    }

    //created_by
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
