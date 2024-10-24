<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'join_date',
        'position',
        'department',
        'photo'
    ];

    protected $casts = [
        'join_date' => 'date',
    ];

    public function getHireDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d M, Y'); // Format sesuai kebutuhan
    }
}
