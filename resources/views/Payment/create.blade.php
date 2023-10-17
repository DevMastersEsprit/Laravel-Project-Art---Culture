@extends('layouts.app') 


@section('content')
  
    <div class="container">
        <div class="card">
            <form role="form" method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add a payment</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Enter your payment information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount" class="form-control-label">Amount</label>
                                <input class="form-control" type="number" name="amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_method" class="form-control-label">Payment method</label>
                                <select class="form-control" name="payment_method">
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Champ pour la date de paiement -->
                    <input type="hidden" name="payment_date" value="{{ now()->toDateString() }}">

                    <!-- Champ pour le statut (par défaut à "Pending") -->
                    <input type="hidden" name="status" value="Pending">

                    <!-- Champ pour l'ID de transaction (généré aléatoirement) -->
                    <input type="hidden" name="transaction_id" value="{{ rand(1000, 9999) }}"> 

                    <div class="field">
                        <div class="control">
                            <a class="btn btn-primary" href="{{ route('checkout') }}" type="submit">Pay</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
