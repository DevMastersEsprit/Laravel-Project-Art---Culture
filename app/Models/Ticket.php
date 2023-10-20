<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'ref_ticket',
        'description',
        'amount',
        'nbre_tickets',

      



    ];
    // Dans le modèle Ticket.php
public function payment()
{
    return $this->belongsTo(Payment::class);
}
}
