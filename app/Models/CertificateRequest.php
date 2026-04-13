<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    protected $fillable = [
        'user_id',
        'certificate_type',
        'purpose',
        'status',
    ];

    // Relationships:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
