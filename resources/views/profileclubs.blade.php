@extends('layouts.front')

@section('content')


    <body>

    <main id="main">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="col-12">
        <div class="container d-flex justify-content-center">
            @foreach($clubs as $club)
            <div class="col-12">




                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class=" bg-c-lite-green user-profile">
                            <div class="card-block  text-white" style="background: url('{{$club['banner']}}') no-repeat top;min-height:400px;">

                            </div>
                        </div>
						<div class="row" >
							<div class="col-8">
								<div class="m-b-25" style="text-align:left;">
									<img  src="{{$club['logo']}}" style="border-radius: 50%;border:2px solid #ccc;width:180px;float:left;position:relative;top: -30px;margin: 0 20px;">
									 <h1 class="f-w-600">{{$club['name']}}</h1>
									 <p class="m-b-10 f-w-600">{{$club['description']}}</p>
								</div>
							</div>
							<div class="col-4">
								<div style="margin-top:30px;">
	<?php
		$etat = 0;
		$count = 0;
		if(Auth::user()){
		$user = Auth::user();
		$id_u = $user->id;
		$clubetudiants = DB::table('clubetudiants')
		->where('id_etudiant', $id_u)
		->where('id_club', $club['id'])
		->get();
		$count = count($clubetudiants);
		foreach ($clubetudiants as $clubetudiant){
			$id_etudiant     =  $clubetudiant->id_etudiant;
			$id_clubetudiant =  $clubetudiant->id;
			$etat =  $clubetudiant->etat;
		}
		}

	?>

							<?php if ($count) { ?>
									<div class="wrap-login100-form-btn">
									<a href="#"  class="button login100-form-btn">
										  <?php if ($etat==1) { ?> Vous êtes membre dans ce club<?php }else{ ?>Votre demande a été envoyé<?php }  ?>
									   </a>
								   </div>
								<?php }else{ ?>
									<?php if(Auth::user()){?>
										<div class="wrap-login100-form-btn">
											<a href="/joindreclub/{{$club['id']}}"  class="button login100-form-btn">
												   Joindre ce club
											</a>
										</div>
									<?php }else{ ?>
										<div class="wrap-login100-form-btn">
											<a href="/login"  class="button login100-form-btn">
												   Connectez-vous pour joindre ce club
											</a>
										</div>
									<?php } ?>
								<?php } ?>
								</div>
							</div>
						</div>

                    </div>
                </div>




			<div class="col-12">
				<div class="card-block">
					<div class="row">

					<div class="col-sm-4 card user-card-full" >




					<style>
							.fa-star,.fa-star-o,.fa-star-half-o{color:#ecb900 !important;font-weight: 400 !important;font-size:20px !important;top: 0 !important;}
							.fa-star-half-o{font-size:18px;position:relative;top:-1px;}
							.service-detail h4:after{
								background:transparent !important;
							}
						</style>
						<h4 class="title-sidebar">Note Moyenne du Club</h4>
						<div class="star-rating">
							<?php
						//echo $avg_club;
							$note_round = $avg_club;
							for ($i=0; $i<5; $i++) {

							 if($note_round>$i and $note_round<$i+1) {
								 $star ='fa fa-star-half-o';
							 }elseif($note_round>$i) {
								 $star ='fa fa-star';
							 }else{
								$star ='fa fa-star-o';
							 }
							?>


							<span class="<?php echo $star; ?>"  ></span>
							<?php } ?>
						</div>

							<h4 class="title-sidebar">Responsable du Club</h4>


<?php
$chefs = DB::table('users')
->where('national_identity_card', $club['cin_leader'])
->get();

foreach ($chefs as $chef){
 $personal_image = 	$chef->personal_image;
 $name 			 =  $chef->name;
 $last_name 	 =  $chef->last_name;
 $email 		 =  $chef->email;
 $phone_number 		 =  $chef->phone_number;
}

?>

							<p class="para-sidebar">
							<img src="{{$personal_image }}" alt="{{$name }} {{$last_name }}" style="width:75px;border-radius:50%;float:left;margin-right:10px;"/>
							<strong>{{$name }} {{$last_name }}</strong> <br />
							E-mail : {{$email }}  <br />
							Tél : {{$phone_number }}</p>

							<h4 class="title-sidebar">Membres du Club</h4>
							<ul>
	<?php

		$clubetudiants = DB::table('clubetudiants')
		->where('id_club', $club['id'])
		->where('etat', 1)
		->get();
		$count = count($clubetudiants);
		foreach ($clubetudiants as $clubetudiant){
			$id_etudiant     =  $clubetudiant->id_etudiant;
			$id_clubetudiant =  $clubetudiant->id;
			//$etat =  $clubetudiant->etat;

			$useretudiants = DB::table('users')
			->where('id', $id_etudiant)
			->get();
			foreach ($useretudiants as $useretudiant){
				$id_e     =  $useretudiant->id;
				$name     =  $useretudiant->name;
				$last_name     =  $useretudiant->last_name;
				$personal_image     =  $useretudiant->personal_image;
			}
	?>
		<li style="display:inline-block;"><a href="/etudiants/{{$id_e}}"><img src="{{$personal_image}}" alt="{{$name}} {{$last_name}}" style="width:45px;border-radius:50%;float:left;margin-right:5px;"/></a></li>
	<?php

		}
	?>
					</ul>



			 <?php  if ($etat==1) { ?>
			<div id="blog" class="blog">
				<div class="blog-comments">

              <h4 class="comments-count">Commentaires</h4>

			<div class="reply-form" style="box-shadow: none;padding:0">

                <form action="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" value="{{$club['id']}}" name="idclub" id="idclub"/>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" id="comment" class="form-control" placeholder="Votre commentaire"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" style="float:right;" id="envoi">Envoyer</button>

                </form>

              </div>
			  <div style="clear:both;"></div>
			  <div class="block_commentaires">
			  <div id="messages">
			@foreach($comments_club as $comment)

			<?php
			$useretudiants = DB::table('users')
			->where('id', $comment['id_etudiant'])
			->get();
			foreach ($useretudiants as $useretudiant){
				$name     =  $useretudiant->name;
				$last_name     =  $useretudiant->last_name;
				$personal_image     =  $useretudiant->personal_image;
			}
			?>
              <div id="comment-{{$comment['id']}}" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{$personal_image}}" alt=""></div>
                  <div>
                    <h5><a href="">{{$name}} {{$last_name}}</a></h5>
                    <time datetime="2020-01-01">{{$comment['created_at']}}</time>
                    <p>
                      {{$comment['message']}}
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->
			@endforeach
			</div>
			</div>


            </div><!-- End blog comments -->

			</div>

			 <?php } ?>

						</div>


						<div class="col-sm-8 ">

							<section id="blog" class="blog card user-card-full">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <?php //var_dump($clubs); ?>




          <div class="col-lg-12 entries" >
              @foreach($publications as $publication)
            <article class="entry">

              <div class="entry-img">
                  <img src="{{ $publication['banner']  }}" alt="" class="img-fluid" style="max-height:250px;">
              </div>

              <h2 class="entry-title">
                <a href="/publications/{{ $publication['id']  }}">{{ $publication['name']  }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/publications/{{ $publication['id']  }}">{{ $publication['type']  }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="/publications/{{ $publication['id']  }}"><time datetime="2020-01-01">{{ $publication['date_and_time']  }}</time></a></li>

                </ul>
              </div>



              <div class="entry-content">
                <p>
                   {!! Str::words($publication['description'], 20, ' ...') !!}
                </p>
                <div class="read-more">
                  <a href="/publications/{{ $publication['id']  }}">Voir Plus</a>
                </div>


              </div>


            </article><!-- End blog entry -->

              @endforeach
			</div>
		</div>

	</div>


    </section>



						</div>

					</div>
				</div>
			</div>


            </div>


            @endforeach
        </div>
        </div>
    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

 <script>
$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var idclub = encodeURIComponent( $('#idclub').val() ); // on sécurise les données
    var comment = encodeURIComponent( $('#comment').val() );

	var _token = "{{csrf_token()}}";

    if(idclub != "" && comment != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "/clubcommentaires", // on donne l'URL du fichier de traitement
            type : "POST", // la requête est de type POST
            data : "_token=" + _token +"&idclub=" + idclub + "&comment=" + comment // et on envoie nos données
        });
		$("#comment").val('');
		charger();
       //$('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
    }
});

function charger(){

    setTimeout( function(){
        // on lance une requête AJAX
		 var idclub = encodeURIComponent( $('#idclub').val() );
		 var _token = "{{csrf_token()}}";
        $.ajax({
            url : "/ChargerCommentairesClub/"+idclub+"&_token=" + _token,
            type : "GET",
            success : function(html){
				$( "#messages" ).empty();
                $('#messages').prepend(html); // on veut ajouter les nouveaux messages au début du bloc #messages
            }
        });

        charger(); // on relance la fonction

    }, 500); // on exécute le chargement toutes les 5 secondes

}

charger();


</script>

    </main><!-- End #main -->
    </body>

@endsection
