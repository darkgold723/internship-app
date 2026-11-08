<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $fillable = ['user_id', 'company_name', 'position', 'apply_date', 'remarks', 'status'];

    // ADD THIS
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}