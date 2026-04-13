<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityEvent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'event_date', 'location'];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}