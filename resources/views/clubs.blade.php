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
                      <a href="/clubs/{{ $club['id']  }}">  <img  src="{{ $club['banner']  }}" alt="" class="img-fluid"></a>
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                      <a href="/clubs/{{ $club['id']  }}"> <h3>{{ $club['name']  }}</h3></a>
                      <br>
                      <p class="fst-italic">
                          {{ $club['description']  }}
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


