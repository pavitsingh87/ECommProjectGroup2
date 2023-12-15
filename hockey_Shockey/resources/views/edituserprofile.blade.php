@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row p-4">
    <h3 class="order-first widget_title">Profile Dashboard</h3>
    <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
      <div class="sidebar">
        <div class="widget">
          <ul class="widget_categories">
            <li>
              <a class="categories_name" href="/edituserprofile" class="text-dark">
                <i class="bi bi-caret-right-fill btn-primary"></i>
                <span class="categories_name">Edit Profile</span></a>
            </li>
            <li>
              <a class="categories_name" href="#" class="text-dark">
                <i class="bi bi-caret-right-fill btn-primary"></i>
                <span class="categories_name">My Orders</span></a>
            </li>
            <li>
              <a class="categories_name" href="/wishlist" class="text-dark">
                <i class="bi bi-caret-right-fill btn-primary"></i>
                <span class="categories_name">My Wishlist</span></a>
            </li>
            <li>
              <a class="categories_name" href="{{ route('change-password') }}" class="text-dark">
                <i class="bi bi-caret-right-fill btn-primary"></i>
                <span class="categories_name">Change
                  Password</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Main Content -->
    <div class="col-lg-9">
      <div class="row">
        <h2 class="heading">Edit Profile</h2>
        <div class="card">

          <div class="card-body">
            <form action="{{ route('userprofile.update') }}" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf
              @method('PATCH')

              <div class="col-md-4">
                <label for="first_name" class="form-label"><strong>First name:</strong></label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                  value="{{ auth()->user()->first_name }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid First name.
                </div>
              </div>
              <div class="col-md-4">
                <label for="last_name" class="form-label"><strong>Last name:</strong></label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                  value="{{ auth()->user()->last_name }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Last name.
                </div>
              </div>

              <div class="col-md-4">
                <label for="email" class="form-label"><strong>Email:</strong></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}"
                  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Email.
                </div>
              </div>

              <div class="col-md-4">
                <label for="contact_no" class="form-label"><strong>Contact Number:</strong></label>
                <input type="text" class="form-control" id="contact_no" name="contact_no"
                  value="{{ auth()->user()->contact_no }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Contact Number.
                </div>
              </div>

              <div class="col-md-4">
                <label for="address_line_1" class="form-label"><strong>Address Line 1:</strong></label>
                <input type="text" class="form-control" id="address_line_1" name="address_line_1"
                  value="{{ auth()->user()->address_line_1 }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Address.
                </div>
              </div>

              <div class="col-md-4">
                <label for="city" class="form-label"><strong>City:</strong></label>
                <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}"
                  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid City.
                </div>
              </div>

              <div class="col-md-4">
                <label for="country" class="form-label"><strong>Country:</strong></label>
                <input type="text" class="form-control" id="country" name="country"
                  value="{{ auth()->user()->country }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Country.
                </div>
              </div>

              <div class="col-md-4">
                <label for="postal_code" class="form-label"><strong>Postal Code:</strong></label>
                <input type="text" class="form-control" id="postal_code" name="postal_code"
                  value="{{ auth()->user()->postal_code }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Please provide a valid Postal Code.
                </div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                  <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
