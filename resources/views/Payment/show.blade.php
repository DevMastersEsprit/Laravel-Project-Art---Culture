
    <div class="container">
        <h1>Payment Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Amount: {{ $payment->amount }}</h5>
                <p class="card-text">Payment Method: {{ $payment->payment_method }}</p>
                <p class="card-text">Transaction ID: {{ $payment->transaction_id }}</p>
                <p class="card-text">Status: {{ $payment->status }}</p>
                <p class="card-text">Payment Date: {{ $payment->payment_date }}</p>
            </div>
        </div>
    </div>

