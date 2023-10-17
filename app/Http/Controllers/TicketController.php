<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function generateTicketFromTransaction($transactionId)
    {
        // Recherchez le paiement en fonction de l'ID de transaction
        $payment = Payment::where('transaction_id', $transactionId)->first();

        // Vérifiez si le paiement existe
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Générez une chaîne de 20 chiffres de manière aléatoire
        $referenceTicket = '';
        for ($i = 0; $i < 20; $i++) {
            $referenceTicket .= rand(0, 9);
        }

        $ticket = new Ticket([
            'nom' => 'Nom par défaut', 
            'reference_ticket' => $referenceTicket, 
            'description' => 'Description par défaut', 
            'prix' => $payment->amount, 
            'start_event_date' => now(), 
            'end_event_date' => '2023-12-31', 
        ]);

        $ticket->save();

        return response()->json(['message' => 'Ticket generated successfully', 'ticket' => $ticket], 201);
    }

    public function createFromPayment(Request $request, $paymentId)
{
    // Récupérez le paiement existant
    $payment = Payment::find($paymentId);

    // Vérifiez si le paiement existe
    if (!$payment) {
        return redirect()->route('payments.index')->with('error', 'Le paiement n\'existe pas.');
    }

    // Créez un nouveau ticket en utilisant les données du paiement
    $ticketData = [
        'name' => 'Nom du ticket', // Remplacez par les données du paiement
        'ref_ticket' => 'Référence du ticket', // Remplacez par les données du paiement
        'description' => 'Description du ticket', // Remplacez par les données du paiement
        'amount' => $payment->amount,
        'start_event_date' => now(), // Remplacez par la date de l'événement souhaitée
        'end_event_date' => 'Durée du ticket', // Remplacez par les données du paiement
    ];

    $ticket = new Ticket($ticketData);

    // Associez le ticket au paiement
    $payment->tickets()->save($ticket);

    return redirect()->route('payments.show', $paymentId)->with('success', 'Ticket créé avec succès.');
}

}
