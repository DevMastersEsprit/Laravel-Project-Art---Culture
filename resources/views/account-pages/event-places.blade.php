@extends('layouts.front-office')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />

<div class="px-5 py-4 container-fluid" style="margin-left: 20%">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <div class="pb-0 card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="">{{ $place->name }}</h5>
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" id="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert" id="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div table class="table text-secondary text-center">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Name
                                </th>

                                <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Description
                                </th>
                                <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Address
                                </th>

                                <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Availability
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $area->name }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $area->description }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $area->address }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $area->availability ? 'Available' : 'Not Available' }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var map = L.map('map').setView([{{ $place->latitude }}, {{ $place->longitude }}], 13); // Centered on place->latitude and place->longitude

    // Add a tile layer (e.g., OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Add a marker at the place's coordinates
    L.marker([{{ $place->latitude }}, {{ $place->longitude }}]).addTo(map);

</script>

