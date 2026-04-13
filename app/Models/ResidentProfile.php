<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'purok',
        'contact_number',
    ];

    // Relationships:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
