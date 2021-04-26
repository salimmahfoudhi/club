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
              <img src="{{ $etudiant['personal_image']  }}" alt="">
              <h4>{{ $etudiant['last_name']  }} {{ $etudiant['name']  }}</h4>
              <span>Chief Executive Officer</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
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

