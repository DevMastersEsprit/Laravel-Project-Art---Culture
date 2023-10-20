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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
