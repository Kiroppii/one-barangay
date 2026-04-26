<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    // Allow Laravel to save data into these specific columns
    protected $fillable = [
        'user_id',
        'document_type',
        'purpose',
        'status'
    ];

    // Optional: Setup the relationship so you can easily pull the resident's name later
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}