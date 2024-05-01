<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'service_id',
        'branch_id',
        'date',
        'from_hour',
        'to_hour',
        'time_data',
    ];
    protected $casts = [
        'date' => 'datetime', // Ensure the 'date' attribute is cast to DateTime
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function registration()
{
    return $this->belongsTo(Registration::class);
}
}
