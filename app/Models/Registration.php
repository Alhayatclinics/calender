<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'name',
        'birth_date',
        'gender',
        'medical_insurance',
        'n_insurance',
        'confirmation',
        'n_id',
        'price',
        'time_from',
        'time_to',
        'doctor_name',
        'service_name',
        'branch_name',
        'email',
        'day',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
        'day' => 'date',
    ];
}
