@extends('layouts.main')


@section('content')

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <h1 class="heading">Contact Us</h1>
            <div class="row gx-4 gx-lg-5 align-items-center contact justify-content-between">
               
                    <div class="col-md-6">

                        <form>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" aria-describedby="nameHelp"
                                    placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="phone" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label><br />
                                <textarea id="message" name="message" rows="4" cols="68">Your Message</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="images/map.png" alt="google map" style="width:70%;float:right;">
                    </div>
            
            </div>
        </div>
        </div>
    </section>




@endsection
