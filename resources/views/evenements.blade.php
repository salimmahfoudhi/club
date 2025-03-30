@extends('layouts.front')
@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Accueil</a></li>
          <li>Evenements</li>
        </ol>
        <h2>Evenements</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <?php //var_dump($clubs); ?>




         <div class="col-lg-12 entries" >
			<div class="row">
             @foreach($evenements as $evenement)
			 <div class="col-lg-4 " >
            <article class="entry">

              <div class="entry-img">
                  <img src="{{ $evenement['banner']  }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="/publications/{{ $evenement['id']  }}" class="hidepublication">{{ $evenement['name']  }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/publications/{{ $evenement['id']  }}" class="hidepublication">{{ $evenement['name']  }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="/publications/{{ $evenement['id']  }}" class="hidepublication"><time datetime="2020-01-01">{{ $evenement['date_and_time']  }}</time></a></li>

                </ul>
              </div>



              <div class="entry-content">
                <p>
					  {!! Str::words($evenement['description'], 20, ' ...') !!}
                </p>
                <div class="read-more">
                  <a href="/publications/{{ $evenement['id']  }}" class="hidepublication">Voir Plus</a>
                </div>


              </div>


            </article><!-- End blog entry -->
			</div>
              @endforeach
			</div>


		</div>
		</div>
		</div>


    </section><!-- End Blog Section -->





  </main><!-- End #main -->

@endsection


