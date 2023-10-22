
<div class="container">
    <h1>Payment Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ticket name: {{ $ticket->name_ticket }}</h5>
            <p class="card-text">Amount: {{ $ticket->amount }}</p>
            <p class="card-text">Type : {{ $ticket->type }}</p>
            <p class="card-text">Description: {{ $ticket->description }}</p>
            <p class="card-text">Ticket refrence: {{ $ticket->ref_ticket }}</p>
        </div>
    </div>
</div>
