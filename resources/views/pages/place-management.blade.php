@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Place Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Lieux</h6>
                </div>

                <form method="POST" action="{{ route('places.store') }}">
                    @csrf

                        <script>
                            setTimeout(function() {
                                document.querySelectorAll('.alert').forEach(function(alert) {
                                    alert.style.display = 'none';
                                });
                            }, 10000);
                        </script>


                    <!-- Ajout des champs -->
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                        <input type="text" name="category" class="form-control" placeholder="Category">
                        <input type="text" name="facilities" class="form-control" placeholder="Facilities">
                        <textarea name="internal_rules" class="form-control" placeholder="Internal Rules"></textarea>
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>

                    <!-- Ajout du bouton de soumission -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Add a place</button>
                    </div>
                </form>
                @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-light" role="alert">
                        {{ $error }}
                    </div>
                @endforeach

                <script>
                    setTimeout(function() {
                        document.querySelectorAll('.alert').forEach(function(alert) {
                            alert.style.display = 'none'; // Masque les alertes après 30 secondes
                        });
                    }, 30000); // 30 000 millisecondes (30 secondes)
                </script>
            @endif
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Facilities</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Internal Rules</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($places as $place)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $place->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0" style="pointer-events: none;">{{ $place->address }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->description }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->category }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->facilities }}</p>
                                    </td>


                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->internal_rules }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->phone_number }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->email }}</p>
                                    </td>


                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->created_at->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <button class="btn btn-warning btn-sm edit-btn" data-place-id="{{ $place->id }}">
                                                <i class="fas fa-edit"></i> edit
                                            </button>
                                            <div style="margin-right: 10px;"></div>
                                            <form method="POST" action="{{ route('places.destroy', $place->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-btn" data-place-id="{{ $place->id }}">
                                                    <i class="fas fa-trash-alt"></i> delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="edit-form-row" data-place-id="{{ $place->id }}" style="display: none;">
                                    <td colspan="15">
                                        <form action="{{ route('places.update', $place->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $place->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $place->address }}" required>
                                            </div>
                                            <!-- Add new fields here with appropriate input types and placeholders -->

                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder="Description">{{ $place->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $place->category }}">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="internal_rules" class="form-control" placeholder="Internal Rules">{{ $place->internal_rules }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ $place->phone_number }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $place->email }}">
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        </form>







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
        document.addEventListener("DOMContentLoaded", function () {
            const editButtons = document.querySelectorAll(".edit-btn");
            editButtons.forEach((editButton) => {
                editButton.addEventListener("click", function () {
                    const placeId = this.getAttribute("data-place-id");

                    const editFormRow = document.querySelector(`.edit-form-row[data-place-id="${placeId}"]`);
                    editFormRow.style.display = "table-row";
                });
            });
        });
    </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll(".edit-btn");
        editButtons.forEach((editButton) => {
            editButton.addEventListener("click", function () {
                const placeId = this.getAttribute("data-place-id");

                const editFormRow = document.querySelector(`.edit-form-row[data-place-id="${placeId}"]`);
                editFormRow.style.display = "table-row";
            });
        });


        const deleteButtons = document.querySelectorAll(".delete-btn");
        deleteButtons.forEach((deleteButton) => {
            deleteButton.addEventListener("click", function () {
                var placeId = this.getAttribute('data-place-id');


                if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
                    window.location.href = '/places';
                } else {
                    alert('Suppression annulée.');
                }
            });
        });
    });
</script>


@endsection

