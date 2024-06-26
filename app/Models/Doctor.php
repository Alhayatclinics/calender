<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_id',
    ];

    // Define relationship with Branch model
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
