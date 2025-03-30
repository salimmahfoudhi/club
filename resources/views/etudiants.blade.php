@extends('layouts.front')
@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Accueil</a></li>
          <li>Etudiants</li>
        </ol>
        <h2>Etudiants</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
	
	
	<section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>Les <strong>Etudiants</strong></h2>
        </div>

        <div class="row">
			@foreach($etudiants as $etudiant)
			<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
				<div class="member aos-init aos-animate" data-aos="fade-up">
				  <div class="member-img">
					<img src="{{ $etudiant['personal_image']  }}" class="img-fluid etudiantimg" alt="">
					<div class="social">
					  <a href="/etudiants/{{$etudiant['id']}}"><i class="bi bi-card-heading"></i> Voir Profil</a>
					</div>
				  </div>
				  <div class="member-info">
					<h4>{{ $etudiant['last_name']  }} {{ $etudiant['name']  }}</h4>
					<?php $roleetudiant = $etudiant->roles()->get(); ?>
					<span>
					@foreach($roleetudiant as $role)					
						{{ $role->name }}
					@endforeach</span>
				  </div>
				</div>
			</div>
			@endforeach

        </div>

      </div>
    </section>


  </main><!-- End #main -->

@endsection

