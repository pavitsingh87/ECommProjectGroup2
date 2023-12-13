<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-4">
        <!-- Sidebar -->
        <div class="col-md-3 mt-5 ">
            <div class="list-group d-flex flex-column">
                
                <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                <a href="#" class="list-group-item list-group-item-action">Wishlist</a>
                <a href="#" class="list-group-item list-group-item-action">Change Password</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h2 class="heading">My Profile</h2>
            <div class="card">

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ auth()->user()->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong> {{ auth()->user()->email }}
                    </div>

                    <div class="mb-3">
                        <strong>Address:</strong>
                        <div>
                            {{ auth()->user()->address_line_1 }}
                        </div>
                        
                        <div>
                            {{ auth()->user()->city }},
                            {{ auth()->user()->country }}
                        </div>
                        <div>
                            Postal Code: {{ auth()->user()->postal_code }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
