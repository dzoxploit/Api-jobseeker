<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCandidate extends Model
{
    use HasFactory;

    protected $table = 't_candidate';

    protected $primaryKey = 'candidate_id';

    protected $fillable = [
        'email',
        'phone_number',
        'full_name',
        'dob',
        'pob',
        'gender',
        'year_exp',
        'last_salary',
    ];

}
