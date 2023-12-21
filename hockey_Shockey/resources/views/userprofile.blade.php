<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif

    <div class="row p-4">
        <!-- Sidebar -->
        @include('layouts.partials.sidebarProfile')

        <!-- Main Content -->
        <div class="col-md-9">
            <h2 class="heading">My Profile</h2>
            <div class="card">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0 w-100">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                    <h5>{{ auth()->user()->first_name }}</h5>
                                    <p>{{ auth()->user()->last_name }}</p>
                                    <i class="far fa-edit mb-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">{{ auth()->user()->email }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Phone</h6>
                                                <p class="text-muted">{{ auth()->user()->contact_no }}</p>
                                            </div>
                                        </div>
                                        <h6>Info</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Adrress</h6>
                                                <p class="text-muted">{{ auth()->user()->address_line_1 }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>City</h6>
                                                <p class="text-muted">{{ auth()->user()->city }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Country</h6>
                                                <p class="text-muted">{{ auth()->user()->country }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Postal Code</h6>
                                                <p class="text-muted">{{ auth()->user()->postal_code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
