@extends('layouts.front')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Accueil</a></li>
          <li>Clubs</li>
        </ol>
        <h2>Clubs</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->




      <section id="about" class="about">
          @foreach($clubs as $club)
          <div class="container">

              <div class="row">

                  <div class="col-lg-6">
                      <img  src="{{ $club['logo']  }}" alt="" class="img-fluid">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                      <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                      <p class="fst-italic">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                          magna aliqua.
                      </p>
                      <ul>
                          <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                          <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                          <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                      </ul>
                      <p>
                          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                          culpa qui officia deserunt mollit anim id est laborum
                      </p>
                  </div>
              </div>
<br>
              <br>
          </div>
          @endforeach
      </section>
      <!-- End About Section -->



  </main><!-- End #main -->

@endsection


