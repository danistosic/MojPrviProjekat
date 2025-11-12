<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    

    // Tablica je jednina (kontakt), pa je rucno navodimo
    protected $table = 'contact';

    // Polja koja dopustamo za mass assignment
    protected $fillable = [
        'email',
        'subject',
        'message',
    ];
}
