@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Edit payment</h1>

        <form method="POST" action="{{route('payments.update', $payment->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}">
            </div>

            <div class="form-group">
                <label for="payment_method">Payment method</label>
                <select class="form-control" id="payment_method" name="payment_method">
                    <option value="Credit Card" @if ($payment->payment_method === 'Credit Card') selected @endif>Credit Card</option>
                    <option value="PayPal" @if ($payment->payment_method === 'PayPal') selected @endif>PayPal</option>
                    <option value="Bank Transfer" @if ($payment->payment_method === 'Bank Transfer') selected @endif>Bank Transfer</option>
                </select>
                  <input type="hidden" name="payment_date" value="{{ now()->toDateString() }}">

                  <input type="hidden" name="status" value="Pending">

                  <input type="hidden" name="transaction_id" value="{{ rand(1000, 9999) }}"> 

            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
