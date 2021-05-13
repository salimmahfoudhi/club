@extends('layouts.front')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Accueil</a></li>
          <li>Etudiants</li>
        </ol>
        <h2>Etudiants</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
            <?php //var_dump($etudiants); ?>
            @foreach($etudiants as $etudiant)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">


                <a href="/etudiants/{{$etudiant['id']}}"><img src="{{ $etudiant['personal_image']  }}" alt=""></a>


                <a href="/etudiants/{{$etudiant['id']}}" style="color:black;!important;"><h4> {{ $etudiant['last_name']  }} {{ $etudiant['name']  }}</h4></a>

                 <span>


                  </span>

              <p>
                  {{ $etudiant['disctiption']  }}
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
                @endforeach


        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

@endsection

