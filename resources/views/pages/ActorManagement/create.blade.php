@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create a new Actor'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 p-4">
                    <h2>Add a new actor</h2>
                    <form action="{{ route('actor-management.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">FullName</label>
                            <input name="fullName" type="text" class="form-control" placeholder="Enter fullName">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="exemple@exemple.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Date</label>
                            <input name="birthDate" type="date" class="form-control" placeholder="Enter birthDate">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Birth Place</label>
                            <input name="birthPlace" type="text" class="form-control" placeholder="Enter birthPlace">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Biography</label>
                            <textarea name="biography" type="text" class="form-control" placeholder="Enter biography"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nationality</label>
                            <input name="nationality" type="text" class="form-control" placeholder="Enter nationality">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Specialities</label>
                            <textarea name="specialties" type="text" class="form-control" placeholder="Enter specialties"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Profile Picture</label>
                            <input name="profilePicture" type="file" class="form-control"
                                placeholder="Enter profilePicture">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone Number</label>
                            <input name="phoneNumber" type="text" class="form-control" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Social Connections</label>
                            <textarea name="socialConnections" type="text" class="form-control" placeholder="Enter socialConnections"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Discographyr</label>
                            <textarea name="discography" type="text" class="form-control" placeholder="Enter discographyr"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Availability</label>
                            <input name="availability" type="text" class="form-control" placeholder="Enter availability">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        @include('layouts.footers.auth.footer')
    </div>
@endsection
