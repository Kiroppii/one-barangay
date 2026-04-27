<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'incident_type', 'description', 'location', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}