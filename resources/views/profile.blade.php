@extends('layouts.front')

@section('content')


<body>

<main id="main">
<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
	@foreach($etudiants as $etudiant)
					
		<div class="row blog">
			@foreach($cv as $cvetudiant)
			<div class="col-sm-12">
				<div class="blog-author d-flex align-items-center">
				  <img src="{{$etudiant['personal_image']}}" class="rounded-circle float-left" alt="">
				  <div>
					<h4>{{ $etudiant['name']  }} {{ $etudiant['last_name']  }}</h4>
					<div class="entry entry-single" style="box-shadow: none;padding:0;padding-top:20px">
					<div class="entry-meta">
						<ul>
						  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">
						@foreach($roles as $role)
							@foreach($roleusers as $roleuser)
                                @if($roleuser['role_id']==$role['id'])
                                    {{$role['name']}} 
								@endif
							@endforeach
						@endforeach
						  
						  
						  </a></li>
						  <li class="d-flex align-items-center"><i class="bi bi-phone"></i> <a href="tel:{{$etudiant['phone_number']}}">{{$etudiant['phone_number']}}</a></li>
						  <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <a href="#"><time datetime="2020-01-01">{{$etudiant['Date_of_Birth']}}</time></a></li>
						  <li class="d-flex align-items-center"><i class="bi bi-at"></i> <a href="mail:{{$etudiant['email']}}">{{$etudiant['email']}}</a></li>
						</ul>
					</div>
					</div>
					<p>
					 {{$cvetudiant['apropos']}}
					</p>
				  </div>
				</div>
			
			</div>
			
			<div class="col-sm-6">
				<div class="blog-author d-flex align-items-center">
				  <div>
					<h4>MES COMPETENCES</h4>
					<p  style="padding-top:20px;">
					 {{$cvetudiant['competences']}}
					</p>
				  </div>
				</div>
			
			</div>
			
			<div class="col-sm-6">
				<div class="blog-author d-flex align-items-center">
				  <div>
					<h4>EDUCATION</h4>
					<p  style="padding-top:20px;">
					 {{$cvetudiant['education']}}
					</p>
				  </div>
				</div>
			
			</div>
			
			<div class="col-sm-12">
				<div class="blog-author d-flex align-items-center">
				  <div>
					<h4>EXPERIENCE</h4>
					<p  style="padding-top:20px;">
					 {{$cvetudiant['experience']}}
					</p>
				  </div>
				</div>
			
			</div>
			
			@endforeach

		</div> 
	@endforeach
             
    </div>
</div>
</section>


</main><!-- End #main -->
</body>

@endsection


