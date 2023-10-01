<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'birthDate' ,
        'birthPlace',
        'biography',
        'nationality',
        'specialties' ,
        'profilePicture',
        'email',
        'phoneNumber',
        'socialConnections' ,
        'discography',
        'availability',
    ];
}
