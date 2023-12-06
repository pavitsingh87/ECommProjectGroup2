@extends('layouts.main')

@section('style')
<style>
    /* navbar content css  */
    .navbar {
  background-color: #fff;
}
  .navbar .navbar-nav {
    display: flex;
    justify-content: center;
    width: 100%;
    gap: 40px;
  }

  .navbar .nav-link {
    color: #544087;
    --bs-nav-link-font-size: 20px;
    font-size: var(--bs-nav-link-font-size);
  }

  .navbar .navbar-info {
    width: 20%;
  }


.promotion-nav {
  color: #f1f1f1;
  background-color: #544087;
}

.nav-item {
  i {
    color: #544087;
  }
}
/* about contents css  */
.heading {
  font-family: 'Nova Mono', monospace, Arial, Helvetica sans-serif;
  margin-top: 0px;
  color: #544087;
}

.rectangle-box {
  background: #544087;
  border-radius: 10px 10px 0px 0px;
  width: 100%;
  height: 200px;
  margin-top: 20px;
}

.rectangle-box h3 {
  color: white;
  text-align: center;
  padding-top: 40px;
}

.cards {
  display: flex;
  justify-content: space-between;
  margin-top: -70px;
}

.card {
  border: none;
  text-align: center;
  background: none;
}

.card-title {
  font-size: 18px;
}

.card img {
  width: 70%;
  align-self: center;
}
</style>
@endsection

@section('content')

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12">
                    <h1 class="heading">About Us</h1>
                    <p>Hockey Shockey is embarking on an exciting venture to launch a cutting-edge e-commerce website 
                        dedicated to meeting the needs of hockey players and enthusiasts. The project aims to create a 
                        dynamic online platform that seamlessly integrates a variety of features and functionalities to 
                        enhance the user experience.
                    </p>
                    <p>Hockey Shockey is embarking on an exciting venture to launch a cutting-edge e-commerce website 
                        dedicated to meeting the needs of hockey players and enthusiasts. The project aims to create a 
                        dynamic online platform that seamlessly integrates a variety of features and functionalities to 
                        enhance the user experience.
                    </p>

                </div>
                <div class="col-md-10" style="margin:auto">
                    <div class="rectangle-box">
                        <h3>Meet the Team</h3>
                    </div>
                    <div class="cards">
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top rounded-circle" src="images/girl 1.png" alt="Profile">
                        <div class="card-body">
                          <h5 class="card-title">Andres Marquez</h5>
                          <p class="card-text">Full Stack Developer</p>
                        </div>
                    </div>
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top rounded-circle" src="images/girl 1.png" alt="Profile">
                        <div class="card-body">
                          <h5 class="card-title">Avneet Hayer</h5>
                          <p class="card-text">DB Administrator</p>
                        </div>
                    </div>
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top rounded-circle" src="images/girl 1.png" alt="Profile">
                        <div class="card-body">
                          <h5 class="card-title">Dipesh Shrestha</h5>
                          <p class="card-text">HTML/CSS/JS</p>
                        </div>
                    </div>
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top rounded-circle" src="images/girl 1.png" alt="Profile">
                        <div class="card-body">
                          <h5 class="card-title">Pavit Makkar</h5>
                          <p class="card-text">Project Manager</p>
                        </div>
                    </div>
                    <div class="card" style="width: 12rem;">
                        <img class="card-img-top rounded-circle" src="images/girl 1.png" alt="Profile">
                        <div class="card-body">
                          <h5 class="card-title">Simron Shrestha</h5>
                          <p class="card-text">UI/UX Designer</p>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
            </div>
        </div>
    </section>



@endsection
