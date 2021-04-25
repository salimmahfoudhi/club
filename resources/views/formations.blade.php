@extends('layouts.front');

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Accueil</a></li>
          <li>Formation</li>
        </ol>
        <h2>Formation</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <?php //var_dump($clubs); ?>




          <div class="col-lg-8 entries" >
              @foreach($formations as $formation)
            <article class="entry">

              <div class="entry-img">
                  <img src="{{ $formation['banner']  }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{ $formation['id']  }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>



              <div class="entry-content">
                <p>
                    {{ $formation['description']  }}
                </p>
                <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div>


              </div>


            </article><!-- End blog entry -->

              @endforeach






    </section><!-- End Blog Section -->





  </main><!-- End #main -->

@endsection


