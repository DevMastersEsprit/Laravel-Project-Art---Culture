@if (session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('events.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event Name:</strong>
                <input type="text" name="nom" value="{{ $evenement->nom }}" class="form-control"
                    placeholder="Event name">
                @error('nom')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event starr date:</strong>
                <input type="datetime-local" name="dateDebut" class="form-control"
                    value="{{ $evenement->date_debut }}">
                @error('dateDebut')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event end date:</strong>
                <input type="datetime-local" name="dateFin" class="form-control"
                    value="{{ $evenement->date_fin }}">
                @error('dateFin')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" value="{{ $evenement->description }}"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>

    </div>

</form>
