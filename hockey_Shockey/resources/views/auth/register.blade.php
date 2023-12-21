@extends('layouts.app')

@section('content')
   

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-form">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <!-- First Name and Last Name (Grouped in a Row) -->
                        <div class="mb-3 row">
                            <div class="form-group form-group-register">
                                <label for="first_name" class="col-form-label text-md-end left-align-label">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="last_name" class="col-form-label text-md-end left-align-label">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender and Date of Birth (Grouped in a Row) -->
                        <div class="mb-3 row">
                            <div class="form-group form-group-register">
                                <label for="gender" class="col-form-label text-md-end left-align-label">{{ __('Gender') }}</label>
                                <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="date_of_birth" class="col-form-label text-md-end left-align-label">{{ __('Date of Birth') }}</label>
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" required>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3 row">
                            <div class="full-width">
                                <label for="email" class="col-form-label text-md-end left-align-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password and Confirm Password (Grouped in a Row) -->
                        <div class="mb-3 row">
                            <div class="form-group form-group-register">
                                <label for="password" class="col-form-label text-md-end left-align-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="password-confirm" class="col-form-label text-md-end left-align-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="mb-3 row">
                            <div class="full-width">
                                <label for="contact_no" class="col-form-label text-md-end left-align-label">{{ __('Contact Number') }}</label>
                                <input id="contact_no" type="tel" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" required>
                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="mb-3 row">
                            <div class="full-width">
                                <label for="user_name" class="col-form-label text-md-end left-align-label">{{ __('Username') }}</label>
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required>
                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Line 1 and Address Line 2 (Grouped in a Row) -->
                        <div class="mb-3 row">
                            <div class="form-group form-group-register">
                                <label for="address_line_1" class="col-form-label text-md-end left-align-label">{{ __('Address Line 1') }}</label>
                                <input id="address_line_1" type="text" class="form-control @error('address_line_1') is-invalid @enderror" name="address_line_1" value="{{ old('address_line_1') }}" required>
                                @error('address_line_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="address_line_2" class="col-form-label text-md-end left-align-label">{{ __('Address Line 2(optional)') }}</label>
                                <input id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror" name="address_line_2" value="{{ old('address_line_2') }}">
                            </div>
                        </div>

                        <!-- City, Country, and Postal Code (Grouped in a Row) -->
                        <div class="mb-3 row">
                            <div class="form-group form-group-register">
                                <label for="city" class="col-form-label text-md-end left-align-label">{{ __('City') }}</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="country" class="col-form-label text-md-end left-align-label">{{ __('Country') }}</label>
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-register">
                                <label for="postal_code" class="col-form-label text-md-end left-align-label">{{ __('Postal Code') }}</label>
                                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required>
                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3 row left-align-button">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <!-- Already Registered Link -->
                        <div class="mb-3 row left-align-button">
                            <div class="col-md-6">
                                <p class="mt-3">
                                    Already registered? <a href="{{ route('login') }}">Sign in here.</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
