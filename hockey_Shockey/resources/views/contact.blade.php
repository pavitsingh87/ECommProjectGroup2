@extends('layouts.main')

@section('content')

<section>
    <div class="container px-4 px-lg-5 my-5">
        <h1 class="heading">Contact Us</h1>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="row gx-4 gx-lg-5 align-items-center contact justify-content-between">

            <div class="col-md-6">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="full_name"
                            aria-describedby="nameHelp" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label><br />
                        <textarea id="message" name="message" rows="4" style="width: 100%; box-sizing: border-box;"
                            placeholder="Your Message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
            </div>

            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43622.67943531407!2d-97.15203590054699!3d49.87705190653698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea73fbf91a2b11%3A0x2b2a1afac6b9ca64!2sWinnipeg%2C%20MB!5e0!3m2!1sen!2sca!4v1702313036257!5m2!1sen!2sca"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</section>

@endsection