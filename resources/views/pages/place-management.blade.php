@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Place Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Lieux</h6>
                </div>
                <form method="POST" action="{{ route('places.store') }}">
                    @csrf

                    {{-- Champ pour le nom --}}
                    <div class="form-group text-center">
                        <input type="text" name="nom" class="form-control form-control-alternative text-center" placeholder="Nom" required>
                    </div>

                    {{-- Champ pour l'adresse --}}
                    <div class="form-group text-center">
                        <input type="text" name="adresse" class="form-control form-control-alternative text-center" placeholder="Adresse" required>
                    </div>

                    {{-- Bouton de soumission du formulaire --}}
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Ajouter une Place</button>
                    </div>
                </form>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
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
                                                <h6 class="mb-0 text-sm">{{ $place->nom }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0" style="pointer-events: none;">{{ $place->adresse }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $place->created_at->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <!-- Bouton "Modifier" -->
                                            <button class="btn btn-warning btn-sm edit-btn" data-place-id="{{ $place->id }}">
                                                <i class="fas fa-edit"></i> Modifier
                                            </button>
                                            <!-- Espacement personnalisé -->
                                            <div style="margin-right: 10px;"></div>
                                            <!-- Bouton "Supprimer" avec boîte de dialogue de confirmation -->
                                            <form method="POST" action="{{ route('places.destroy', $place->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-btn" data-place-id="{{ $place->id }}">
                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                </button>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                                <!-- Formulaire de modification (initialement masqué) -->
                                <tr class="edit-form-row" data-place-id="{{ $place->id }}" style="display: none;">
                                    <td colspan="4">
                                        <form action="{{ route('places.update', $place->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <!-- Champs de formulaire pour la modification -->
                                            <div class="form-group">
                                                <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $place->nom }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="adresse" class="form-control" placeholder="Adresse" value="{{ $place->adresse }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
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
    <!-- Ajoutez le script JavaScript pour gérer le basculement -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editButtons = document.querySelectorAll(".edit-btn");
            editButtons.forEach((editButton) => {
                editButton.addEventListener("click", function () {
                    // Récupérez l'ID de la place associée au bouton "Modifier"
                    const placeId = this.getAttribute("data-place-id");

                    // Affichez le formulaire de modification correspondant
                    const editFormRow = document.querySelector(`.edit-form-row[data-place-id="${placeId}"]`);
                    editFormRow.style.display = "table-row";
                });
            });
        });
    </script>

  <!-- Ajoutez le script JavaScript pour gérer le basculement -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll(".edit-btn");
        editButtons.forEach((editButton) => {
            editButton.addEventListener("click", function () {
                // Récupérez l'ID de la place associée au bouton "Modifier"
                const placeId = this.getAttribute("data-place-id");

                // Affichez le formulaire de modification correspondant
                const editFormRow = document.querySelector(`.edit-form-row[data-place-id="${placeId}"]`);
                editFormRow.style.display = "table-row";
            });
        });

        // Gérer le clic sur le bouton "Supprimer"
        const deleteButtons = document.querySelectorAll(".delete-btn");
        deleteButtons.forEach((deleteButton) => {
            deleteButton.addEventListener("click", function () {
                var placeId = this.getAttribute('data-place-id');

                // Afficher une alerte de confirmation
                if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
                    // Rediriger vers la route de suppression si l'utilisateur confirme
                    window.location.href = '/places'; // Remplacez par votre route de suppression
                } else {
                    // L'utilisateur a annulé la suppression, vous pouvez afficher une alerte annulée
                    alert('Suppression annulée.');
                }
            });
        });
    });
</script>


@endsection

