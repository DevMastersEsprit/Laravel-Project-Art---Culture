@extends('layouts.front-office')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="margin-left:20%">
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                    <h3 class="text-black mb-2">All our available tickets🔥</h3>
                    <hr>
                    <p class="mb-4 font-weight-semibold">
                        Check all the advantages and choose the best.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Tickets list</h6>
                                <p class="text-sm">See information about all our available tickets</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <button type="button" class="btn btn-sm btn-white me-2">
                                    View all your tickets
                                </button>
                                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                    <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v-2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Add member</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive p-0">
                            <table class="table table-striped">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold">Ticket name</th>
                                        <th class="text-secondary text-xs font-weight-semibold">Ticket reference</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold">Description</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold">Type</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold">Amount</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->name_ticket }}</td>
                                        <td>{{ $ticket->ref_ticket }}</td>
                                        <td class="text-center">{{ $ticket->description }}</td>
                                        <td class="text-center">{{ $ticket->type }}</td>
                                        <td class="text-center">{{ $ticket->amount }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('checkout') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-credit-card"></i> Pay
                                            </a>
                                            <!-- Actions spécifiques à chaque élément de la liste -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
                            <div class="ms-auto">
                                <button class="btn btn-sm btn-white">Previous</button>
                                <button class="btn btn-sm btn-white">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
