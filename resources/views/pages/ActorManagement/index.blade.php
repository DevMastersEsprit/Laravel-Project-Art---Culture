@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<style>
    .tdStyle {
        white-space: normal;
        /* Allow text to wrap */
        overflow: visible;
        /* Show overflowed text */
        text-overflow: initial;
        /* Remove ellipsis */
    }
</style>

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Actor Management'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    @if (session('success'))
                        <div class="mt-4 alert alert-success notification is-success" id="success-message" role="alert"
                            style="width: 40%; display:flex; justify-content: center; margin-left: 30%;">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mt-4 alert alert-danger notification is-danger" id="error-message" role="alert"
                            style="width: 40%; display:flex; justify-content: center; margin-left: 30%;">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-header pb-0">
                        <a class="btn" style="color: #fb6340;" href="{{ route('actor-management.create') }}">Add New
                            Actor</a>
                        <h6>List of Actors</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            FullName / Email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            BirthDate / BirthPlace</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Biography</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nationality</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Specialities</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            PhoneNumber</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            SocialConnections</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Discography</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Availability</th>
                                        <th class="text-secondary opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actors as $actor)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="/actorPictures/{{ $actor->profilePicture }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $actor->fullName }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $actor->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->birthDate }}</p>
                                                <p class="text-xs text-secondary mb-0">{{ $actor->birthPlace }}</p>
                                            </td>
                                            <td class="tdStyle" style="width: 400px; white-space: normal;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->biography }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->nationality }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->specialties }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->phoneNumber }}</p>
                                            </td>
                                            <td class="tdStyle" style="width: 400px; white-space: normal;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->socialConnections }}
                                                </p>
                                            </td>
                                            <td class="tdStyle" style="width: 400px; white-space: normal;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $actor->discography }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $actor->availability }}</span>
                                            </td>
                                            <td class="align-middle">
                                                {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit <i class="fa-solid fa-pen"></i>
                                                </a> --}}
                                                {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete <i class="fa-solid fa-trash"></i>
                                                </a> --}}
                                                <a class="btn btn-warning"
                                                    href="{{ route('actor-management.edit') }}?id={{ $actor->id }}">Edit</a>
                                                <form action="{{ route('actor-management.destroy', $actor->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <a class="btn btn-warning"
                                                    href="{{ route('actor-management.edit', $actor->id) }}">Edit</a>
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
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        @include('layouts.footers.auth.footer')
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var $successMessage = $('#success-message');

        if ($successMessage.length) {
            $successMessage.fadeIn().delay(2000).fadeOut();
        }
    });
</script>
