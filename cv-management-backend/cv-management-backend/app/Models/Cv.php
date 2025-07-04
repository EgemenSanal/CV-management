<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'cityLiving',
        'countryLiving',
        'summary',
        'educations',
        'experiences',
        'skills',
    ];
    protected $casts = [
        'experiences' => 'array',
        'educations' => 'array',
        'skills' => 'array',
    ];
    public function user()
{
    return $this->belongsTo(Member::class);
}
}
