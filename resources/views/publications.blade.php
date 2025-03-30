@extends('layouts.front')

@section('content')

    <main id="main">
<div class="page-content page-container blog" id="page-content" >
    <div class="padding">
        <div class="col-12">
        <div class="container d-flex justify-content-center">

            @foreach($publications as $publication)

			<?php $id=$publication['id']; ?>
            <div class="col-12">



			<article class="entry">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
						<div class="row" >
							<div class="col-6">
								<div class="m-b-25" style="text-align:left;">
									<img  src="{{$publication['banner']}}" style="padding: 0 10px;width:100%;">

								</div>
<div class="col-12">
<div class="m-b-25" style="text-align:left;margin:20px;">
<?php if($note_p != null) { ?>
<div id="message">
	<p class="alert alert-success alert-block" ><strong>Votre évaluation a été bien enregistré. Merci</strong></p>
</div>
<?php }else { ?>
    <?php if($count_p == 1) { ?>
<form id="avis_commentaire" class="ajax-form" method="POST">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="idclub" id="idclub" value="{{ $publication['idclub']  }}">
	<div class="col-12" style="margin-bottom:30px;">
	<h5>Merci d'évaluer :</h5>
	<div id="rating_div">
				<div class="star-rating">
					<span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
					<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
					<input type="hidden" name="whatever3" class="rating-value" value="1">
				</div>
	</div>
	</div>
	<div class="col-12">
	<h5>Si vous souhaitez faire parvenir votre témoignage, merci de saisir ci-dessous ou laissez vide.</h5>
		<div class="form-group">
			<textarea class="form-control" rows="4" name="remark" id="remark" placeholder="Écrivez votre avis ici ..."></textarea>
		</div>
</div>

<div class="col-12">
	 <span id="srr_rating" class="btn btn-custom btn-dark ">
                                    Envoyer
                                    <i class="fa fa-angle-right ml-1"></i>
                                </span>
</div>
</form>
    <?php }  ?>
<?php } ?>
</div>
</div>
							</div>
							<div class="col-6">
								<div style="margin-top:30px;">

								<h1 class="f-w-600">{{$publication['name']}}</h1>
								<div class="entry-meta">
									<ul>
										<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/formations">{{ $publication['type']  }}</a></li>
										<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $publication['date_and_time']  }}</time></a></li>

									</ul>
								  </div>

									 <p class="m-b-10 f-w-600">{{$publication['description']}}</p>




                                    <?php if($count_p == 0) { ?>
									 <div class="read-more">
									  <a href="/participPublic/{{ $publication['id']  }}">Je participe</a>
									</div>

									<?php } ?>
		<div id="message">

        </div>
		@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block"  >
                <strong>{{ $message }}</strong>
        </div>

        @endif


								</div>
							</div>
						</div>

                    </div>
                </div>
				</article>





            </div>


            @endforeach
        </div>
        </div>
    </div>
</div>



    </main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/index.js"></script>
<script>
var $star_rating = $('.star-rating .fa');
var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {
});



$("#srr_rating").click(function() {
	var $star_rating = $('.star-rating .fa');
	var rating = parseInt($star_rating.siblings('input.rating-value').val());
	var remark= $('#remark').val();

	var idclub= $('#idclub').val();

	var id = <?php echo $id; ?>;
	var url =  '{{ route('saveRating') }}';
	var form = $('#avis_commentaire');
	var token = '{{ csrf_token() }}';
	if(rating>0 ){



			$.ajax({
                url: url,
                type: 'GET',
                data: {'_token':token,'rating':rating, 'remark': remark, 'id': id,'idclub':idclub},
                success: function (response) {
					$('#message').html('<p class="alert alert-success alert-block" ><strong>Votre évaluation a été bien enregistré. Merci</strong></p>');
					$('#avis_commentaire').hide();
                    if(response.status != 'fail'){
                        console.log(data);
                    }
                }
            });

	}

});
$(".selected").click(function() {
	    var selected = $(this).hasClass("highlight");
		$(".selected").removeClass("highlight");
		if(!selected){
		   $(this).addClass("highlight");
		}

});

</script>

@endsection
