@extends('layouts.front-office') 
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="margin-left: 20%">

    <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
        style="background-image: url('../../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
    </div>
    <x-app.navbar />
    <div class="px-5 py-4 container-fluid ">
        <form 
        action={{ route('articles.update') }} 
        method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert" id="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert" id="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-5 row justify-content-center">
                <div class="col-lg-9 col-12 ">
                    <div class="card " id="basic-info">
                        <div class="card-header">
                            <h5>Basic Info</h5>
                        </div>
                        <div class="pt-0 card-body">

                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                         class="form-control">
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" id="location"
                                        placeholder="Bucharest, Romania" class="form-control">
                                    @error('location')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="0733456987" class="form-control">
                                    @error('phone')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row p-2">
                                <label for="about">About me</label>
                                <textarea name="about" id="about" rows="5" class="form-control">{{ old('about', auth()->user()->about) }}</textarea>
                                @error('about')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-app.footer />
    </div>
</main>

