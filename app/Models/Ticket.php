<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ref_ticket',
        'description',
        'amount',
        'start_event_date',
        'end_event_date',



    ];
    // Dans le modèle Ticket.php
public function payment()
{
    return $this->belongsTo(Payment::class);
}
}
