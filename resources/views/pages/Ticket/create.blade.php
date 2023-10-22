@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form role="form" method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Add ticket information</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Ticket Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ticket" class="form-control-label">Ticket name</label>
                                    <input class="form-control" type="text" name="name_ticket" id="name_ticket" placeholder="Enter the ticket name" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('name_ticket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class="form-control-label">Description</label>
                                    <input class="form-control" type="text" name="description" id="description" placeholder="Enter the ticket description" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount" class="form-control-label">Amount</label>
                                    <input class="form-control" type="number" name="amount" id="amount" placeholder="Enter the price" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type" class="form-control-label">Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="Standard Ticket">Standard Ticket</option>
                                        <option value="VIP Ticket">VIP Ticket</option>
                                        <option value="Student Ticket">Student Ticket</option>
                                        <option value="Family Ticket">Family Ticket</option>
                                        <option value="Group Ticket">Group Ticket</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payments_id" class="form-control-label">Payment</label>
                                    <select class="form-control" name="payments_id" id="payments_id">
                                        @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->Cardholder_Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ref_ticket" class="form-control-label">Ticket reference</label>
                                    <input class="form-control" type="text" name="ref_ticket" id="ref_ticket" placeholder="Enter the reference" onfocus="focused(this)" onfocusout="defocused(this)">
                                    @error('ref_ticket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
